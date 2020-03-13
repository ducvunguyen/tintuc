<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
    	'name_url', 'created_by', 'updated_by'
    ];
}
