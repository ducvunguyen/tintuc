<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\Permission;
use App\Model\PermissionRole;
use Illuminate\Support\Facades\DB;
use Auth;

class RoleController extends Controller
{
    public function index(){
    	$roleList = Role::all();

    	return view('admin.role.index', compact('roleList'));
    }

    public function create(){
    	$listPermission = Permission::all();
    	return view('admin.role.create', compact('listPermission'));
    }

    public function store(Request $request){
    	
    	try {
    	DB::beginTransaction();	

			$insertRole = new Role();
			$insertRole->name_role = $request->name;
			$insertRole->display_role = $request->display_role;
			$insertRole->created_by = Auth::user()->id;
			$insertRole->updated_by = Auth::user()->id;
			$insertRole->save();

			$permission = $request->permission;

    		foreach ($permission as $permission) {
    			$insertPermissionRole = new PermissionRole();
    			$insertPermissionRole->role_id = $insertRole->id;
    			$insertPermissionRole->permission_id = $permission;
    			$insertPermissionRole->created_by = Auth::user()->id;
    			$insertPermissionRole->updated_by = Auth::user()->id;

    			$insertPermissionRole->save();
    		}

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    	}
    	return redirect()->route('admin.role.index');
    }

    public function edit($id){
    	$findRole = Role::findOrfail($id);
    	$listPermission = Permission::all();
    	$getAllPermissionRole = PermissionRole::where('role_id', $id)->pluck('permission_id');

    	return view('admin.role.edit', compact('findRole', 'listPermission', 'getAllPermissionRole'));
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $upRole = Role::find($id);
    	$getpermissionRoleIds = PermissionRole::where('role_id', $id)->get();
        // dd($id, count($getpermissionRoleId));

    	$oldPermissionIds = count($getpermissionRoleIds) > 0 ? $getpermissionRoleIds->pluck('permission_id')->toArray() : [];
        // dd($oldPermissionId);
        DB::beginTransaction();
    	try {
    				
    		$upRole->name_role = $request->name;
    		$upRole->display_role = $request->display_role;
    		$upRole->created_by = Auth::user()->id;
	    	$upRole->updated_by = Auth::user()->id;
	    	$upRole->save();

            $newPremissionIds = $request->permission;
            // dd($newPremissionId);
    		if (count($newPremissionIds) >0) {
    			foreach ($newPremissionIds as $permissionId) {
	    			if (!in_array($permissionId, $oldPermissionIds)) {
	    				$upPermissionRole = new PermissionRole();
	    				$upPermissionRole->role_id = $id;
	    				$upPermissionRole->permission_id = $permissionId;
	    				$upPermissionRole->created_by = Auth::user()->id;
	    				$upPermissionRole->updated_by = Auth::user()->id;
	    				$upPermissionRole->save();
	    			}
	    		}
    		}

            if (count($getpermissionRoleIds) > 0) {
                foreach ($getpermissionRoleIds as $permissionRole) {
                    // dd($permissionRole->permission_id, $newPremissionId);
                    if (!in_array($permissionRole->permission_id, $newPremissionIds)) {
                        $permissionRole->delete();   
                    }
                    // dd('ok');
                }
            }



    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    	}
        return redirect()->route('admin.role.index');
    }

    public function delete($id){
        //xoa role
        $delRole = Role::findOrfail($id);
        $delRole->delete();
        // xoa permissionrole
        $permissionRoleId = PermissionRole::where('role_id', $id)->get();
        // dd($permissionRoleId);
        foreach ($permissionRoleId as $delPermissionRole) {
            # code...
            // dd($delPermissionRole);
            $delPermissionRole->delete();
        }
       return redirect()->back();
    }
}
