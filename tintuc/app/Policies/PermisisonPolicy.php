<?php

namespace App\Policies;

use App\User;
use App\Model\Permission;
use App\Model\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermisisonPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function permission(Role $role, Permission $permission){
        return $role->permission_id === $permission->id;
    }
}
