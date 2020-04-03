<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Permission;
use App\Model\PermissionRole;
use App\Model\Role;
use Auth;
use DB;
class PermissionController extends Controller
{
	public function index(){

		$listPermisions = Permission::all();
		return view('admin.permission.index', compact('listPermisions'));
	}
    //  public function loadData(){

    //     $listPermisions = Permission::all();
    //     return view('admin.permission.load-data', compact('listPermisions'));
    // }

	public function create(){
		$listRoles = Role::all();
		if (count($listRoles) == 0) {
            # code...
			return [
				'status' => 0,
				'message' => 'Chưa có vai trò người dùng. Bạn cần thêm vai trò người dùng trước rồi mới thêm quyền',
			];
		}
		return [
			'status' => 1,
			'show_modal' => view('admin.permission.create', compact('listRoles'))->render()
		];
    	// return view('admin.permission.create', compact('listRoles'));
	}

	public function store(Request $request, Permission $permission){
        // dd($request->role);
		$data = [
			'name_permission' => $request->name_permission,
			'display_permission' => $request->display_permission,
			'created_by' => Auth::id(),
			'updated_by' => Auth::id(),
		];

		$insertPermission = $permission->create($data);
		$roleIds = $request->role;
		foreach ($roleIds as $key => $role) {
			$inserePermissionRole = DB::table('permission_role')->insert([
				'role_id' => $role,
				'permission_id' =>$insertPermission->id,
				'created_by' => Auth::id(),
				'updated_by' => Auth::id(),
			]);
			if (!$inserePermissionRole) {
				return [
					'status' => 0,
					'message' => 'Lưu thất bại permission role',
				];
			}
		}
		if (!$insertPermission) {
			return [
				'status' => 0,
				'message' => 'Lưu thất bại permission',
			];
		}

		$listPermisions = Permission::all();
		return [
			'status' => 1,
			'message' => 'Thêm mới thành công',
			'render_view' => view('admin.permission.load_data', compact('listPermisions'))->render(),
		];
	}
}
