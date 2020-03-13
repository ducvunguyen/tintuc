<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   protected $fillable = [
        'name_role','display_role','created_by','updated_by',
    ];

    public function role_users(){
    	return $this->hasMany('App\Model\RoleUser', 'role_id', 'id');
    }

    public function users(){
    	return $this->belongsToMany('App\Model\User', 'role_user', 'role_id', 'user_id');
    }

    public function permisson_roles(){
    	return $this->hasMany('App\Model\PermissonRole', 'role_id', 'id');
    }

    public function permissions(){
    	return $this->belongsToMany('App\Model\Permisson', 'permission_role', 'role_id', 'permission_id');
    }
    
}
