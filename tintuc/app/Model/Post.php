<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{
	protected $table = 'posts';
    protected $fillable = [
    	'title', 'avatar', 'content', 'category_id', 'updated_by', 'created_by'
    ];

    public function category(){
    	return $this->belongsTo('App\Model\Category', 'category_id', 'id');
    }

    public function comments(){
    	return $this->hasMany('App\Model\Comment', 'post_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function creator(){
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
    public function editor(){
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

    public function UpdatePost($id, $data){
    	$saveUp = DB::table('posts')->where('id', $id)->update($data);

    	if ($saveUp) {
    	 	# code...
    	 	return true;
    	 } 
    	 return false;
    }

    public function InsertPost($data){
    	$saveInsert = DB::table('posts')->insert($data);

    	if ($saveInsert) {
    		return true;
    	}
    	return false;
    }
}
