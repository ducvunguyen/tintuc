<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
	protected $table = 'categpries';
    protected $fillable = [
    	'name','created_by', 'updated_by'

    ];

    public function posts(){
    	return $this->hasMany('App\Model\Post', 'category_id', 'id');
    }

    public function saveCategory($data){
    	$insert = DB::table('categpries')->insert($data);

    	if ($insert) {
    		# code...
    		return true;
    	}
    	else{
    		return false;
    	}
    }

    public function saveUpdate($data, $id){
    	$update = DB::table('categpries')->where('id', $id)->update($data);

    	if ($update) {
    		# code...
    		return true;
    	}
    	else{
    		return false;
    	}
    }

    public function deleteCate($id){
    	$findId = Category::findOrFail($id);

    	if($findId->delete()){
    		return true;
    	}else{
    		return false;
    	}
    }
}
