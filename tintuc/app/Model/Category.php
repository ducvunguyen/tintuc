<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name','created_by', 'updated_by'

    ];

    public function posts(){
    	return $this->hasMany('App\Model\Post', 'category_id', 'id');
    }
}
