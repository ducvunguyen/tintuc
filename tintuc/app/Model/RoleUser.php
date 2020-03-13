<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
	protected $table = 'role_user';
    protected $fillable = [
    	'user_id', 'role_id', 'created_by', 'updated_by',
    ];

    public function user(){
    	return $this->belongsTo('App\Model\User', 'user_id', 'id');
    }

    public function role(){
    	return $this->belongsTo('App\Model\Role', 'role_id', 'id');
    }


}
