<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'users';
    protected $fillable = [
        'name','username', 'email', 'password','created_by','updated_by',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role_users(){
        return $this->hasMany('App\Admin\RoleUser', 'user_id', 'id');
    }

    public function comments(){
        return $this->hasMany('App\Admin\Comment', 'user_id', 'id');
    }

    public function roles(){
        return $this->belongsToMany('App\Admin\Role', 'role_users', 'user_id', 'role_id');
    }
}
