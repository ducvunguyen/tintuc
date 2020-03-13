<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
	protected $table = 'permission_role';
	
    protected $fillable = [
    	'permission_id', 'role_id', 'created_by', 'updated_by',
    ];

    public function permission(){
    	return $this->belongsTo('App\Model\Permission', 'permission_id', 'id');
    }	

    public function role(){
    	return $this->belongsTo('App\Model\Role', 'role_id', 'id');
    }
}
