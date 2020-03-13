<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
use App\Model\Permission;
use App\User;
use App\Model\Role;
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {   
        $userID = Auth::user()->id;
        // dd($userID);
        //1. lay tat ca cac quyen khi user dang nhap vao he thong
        $listRoleOfUser = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('users.id', $userID)
            ->select('roles.*')
            ->get()->pluck('id')->toArray();
           // dung pluck de lay id truyen vao array, dung id de lay toan bo permission
        // $listRoleOfUser = User::findOrFail($userID)->roles()->select('roles.id')->pluck('id')->toArray();
        // dd($listRoleOfUser);
        //2. lay ra cac permission khi user login va he thong

         $listRoleOfPermission = DB::table('roles')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->where('roles.id', $listRoleOfUser)
            ->select('permissions.*')
            ->distinct()
            ->get()->pluck('id');
        // dd($users);

        //3. lấy ra mã màn hình tương ứng($permission ~ nó sẽ lấy role-add, role-list,....) để phân quyền.
        $checkPermission = Permission::where('name_permission', $permission)->value('id');
        // dd($checkPermission);
        //kiem tra xem user co dc phep vao hay khong
        if ($listRoleOfPermission->contains($checkPermission)) {
            # code...
            //check một phần tử có nam trong permission hay ko
            return $next($request);
        }
        return abort(401);
        // dd($checkPermission);
        
    }
}
