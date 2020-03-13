<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'title', 'avatar', 'content', 'category_id', 'updated_by', 'created_by'
    ];

    public function category(){
    	return $this->belongsTo('App\Model\Category', 'category_id', 'id');
    }

    public function comments(){
    	return $this->hasMany('App\Model\Comment', 'post_is', 'id');
    }
}
