<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Role;
use App\Model\RoleUser;
use App\Model\Permission;
use Hash;
use Auth;	
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest\CreateRequest;

class UserController extends Controller
{
	private $user;
	private $role;
	public function __construct(User $user, Role $role){
		$this->user = $user;
		$this->role = $role;
	}

    public function index(){
         $users = DB::table('roles')
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->where('role_user.user_id', Auth::id())
            ->select('permission_role.permission_id')
            ->get()
            ->pluck('permission_id')
            ->toArray();

        $getPermissionId = Permission::find(1)->id;
        if (in_array($getPermissionId, $users)) {
            $listUser = $this->user->all();
            return view('admin.user.index', compact('listUser'));
        }
        return 'Bạn không có quyền!!!';
    	
    }

    public function create(){
        $users = DB::table('roles')
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->where('role_user.user_id', Auth::id())
            ->select('permission_role.permission_id')
            ->get()
            ->pluck('permission_id')
            ->toArray();

        $getPermissionId = Permission::find(2)->id;
        if (in_array($getPermissionId, $users)) {
            $listRole = $this->role->all();
            return view('admin.user.create', compact('listRole'));
        }
        return 'Bạn không có quyền';
    }

    public function store(CreateRequest $request){

    	// var_dump($req->role);
    	// die();
    	try {
    		DB::beginTransaction(); // neu userCreate inser thanh cong va role thanh cong thi no se chay DB::commit
    		$userCreate = $this->user->create([
	    		'name' =>$request->name,
	    		'email' => $request->email,
	    		'password' => Hash::make($request->password),
	    	]);

    		
    		$role = $request->role;
	    	foreach ($role as $role_id) {
	    		# code...
	    		DB::table('role_user')->insert([
	    			'user_id' => $userCreate->id, 
				    'role_id' => $role_id,
				    'created_by' => Auth::user()->id,
				    'updated_by' => Auth::user()->id,
				]);
	    	}
	    	DB::commit();
	    	return redirect()->route('admin.index');
    	} catch (Exception $e) {
    			DB::rollBack();//neu sai se quay tro lai va ko insert nua
    	}
    }

    public function edit($id){
        $users = DB::table('roles')
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->where('role_user.user_id', Auth::id())
            ->select('permission_role.permission_id')
            ->get()
            ->pluck('permission_id')
            ->toArray();

        $getPermissionId = Permission::find(3)->id;
        if (in_array($getPermissionId, $users)) {
            $role_id = DB::table('role_user')->where('user_id',$id)->pluck('role_id');

        // dd($role_id);
            $findUser = User::findOrFail($id);
            $listRole = Role::all();
            return view('admin.user.edit', compact('findUser', 'listRole', 'role_id'));
        }
        return 'Bạn không có quyền';
    	
    }

    public function update(Request $request,$id){
    	// dd($request->all());
    	$user_info = User::where('id', $id)->first();
    	// dd($user_info);
    	if (empty($user_info)) {
    		// return lỗi
    		return 1;
    	}

    	$role_users = RoleUser::where('user_id', $id)->get();
    	$old_role_ids = count($role_users) > 0 ? $role_users->pluck('role_id')->toArray() : [];
    	// dd($old_role_ids);

		DB::beginTransaction();
    	try {
    		// update user
    		$user_info->name = $request->name;
    		$user_info->email = $request->email;
    		$user_info->save();
    		
    		$new_role_ids = $request->role;
    		// dd($new_role_ids);

    		// tim role id moi ma k thuoc mang role cu => tao moi
    		if (count($new_role_ids) > 0) {
    			foreach ($new_role_ids as $new_role_id) {
    				if(!in_array($new_role_id, $old_role_ids)) {
    					// tao moi role user
    					$new_role_user = new RoleUser();
    					$new_role_user->user_id = $id;
    					$new_role_user->role_id = $new_role_id;
    					$new_role_user->created_by = Auth::user()->id;
    					$new_role_user->updated_by = Auth::user()->id;
    					$new_role_user->save();
    				}
    			}
    		}

    		// tim role id cu ma k thuoc mang role moi => xoa
    		if (count($role_users) > 0) {
    			foreach ($role_users as $role_user) {
                    // dd($role_user->role_id, $new_role_ids);
    				if (!in_array($role_user->role_id, $new_role_ids)) {
    					// xoa role user cu
    					$role_user->delete();	
    				}
    			}
    		}

			DB::commit();
            
    	} catch (Exception $e) {
    		DB::rollBack();
    		return redirect()->back()->withErrors('');
    	}

    	return redirect()->route('admin.user.index');
    }

    public function delete($id){
        $users = DB::table('roles')
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->where('role_user.user_id', Auth::id())
            ->select('permission_role.permission_id')
            ->get()
            ->pluck('permission_id')
            ->toArray();

        $getPermissionId = Permission::find(4)->id;
        if (in_array($getPermissionId, $users)) {
            try {
                DB::beginTransaction();
                $findUser = User::findOrFail($id);
                $findUser->delete();

                $findRole = RoleUser::where('user_id', $id)->get();
                if (count($findRole )>0) {
                    # code...
                    foreach ($findRole as $findRole) {
                        $findRole->delete();                
                    }
                }
                $findRole->delete();
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
            }   

            return redirect()->back();
        }
        return 'Bạn không có quyền';
    	
    }


}
