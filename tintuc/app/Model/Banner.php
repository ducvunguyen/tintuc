<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Banner extends Model
{
    protected $table = 'banners';
    protected $fillable = [
    	'name_url', 'created_by', 'updated_by'
    ];

    public function saveInsert($data){
        $insert = DB::table('banners')->insert($data);

    	if ($insert) {
    		# code...
    		return true;
    	}else{
    		return false;
    	}
    }

    public function saveUpdate($id, $data){
        $update = DB::table('banners')->where('id', $id)->update($data);

        if ($update) {
            # code...
            return true;
        }else{
            return false;
        }
    }

}
