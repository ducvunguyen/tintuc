<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Category;

class PostController extends Controller
{
    public function index(){
    	$listPost = Post::all();
		
		return view('admin.post.index', compact('listPost')); 
    }

    public function store(Request $request, Post $post){
        dd($request->all());
    	// $data = [
    	// 	''
    	// ]
    }
}
