<?php

namespace App\Policies;

use App\User;
use App\Model\Permission;
use App\Model\RoleUser;
use App\Model\PermissionRole;
use App\Model\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Permission  $permission
     * @return mixed
     */
    $userId = Auth::user()->id;
    protected $role;
    public function __construct(Role $role){
        $this->role = $role;
    }
    public function before(Role $role){
        $item = $this->role->name_role;
        if ($item === 'admin') {
            # code...
            return true;
        }
        return false;

    }
    public function view(User $user, Permission $permission)
    {
        
    }

    /**
     * Determine whether the user can create permissions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Permission  $permission
     * @return mixed
     */
    public function update(User $user, Permission $permission)
    {
        //
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Permission  $permission
     * @return mixed
     */
    public function delete(User $user, Permission $permission)
    {
        //
    }

    /**
     * Determine whether the user can restore the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Permission  $permission
     * @return mixed
     */
    public function restore(User $user, Permission $permission)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Permission  $permission
     * @return mixed
     */
    public function forceDelete(User $user, Permission $permission)
    {
        //
    }
}
