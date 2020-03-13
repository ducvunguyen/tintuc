<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
    	'name_permission', 'display_permission', 'created_by', 'updated_by',
    ];

    public function permission_roles(){
    	return $this->hasMany('App\Model\PermissionRole', 'permission_id', 'id');
    }

    public function roles(){
    	return $this->belongsToMany('App\Model\Role', 'permission_role', 'role_id', 'permission_id');
    }
}
