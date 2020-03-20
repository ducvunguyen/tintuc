<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Category;
use Auth;

class PostController extends Controller
{
    public function index(){
    	$listPost = Post::with('creator', 'editor')->get();
        // dd($listPost);
        // $categories  = Category::all();
		return view('admin.post.index', compact('listPost')); 
    }

    public function create(){
        // dd(1);
            $categories  = Category::all();

            if (!$categories) {
                return [
                    'status' => 0,
                    'message' => 'Bạn chưa có thể loại nào, bạn phải thêm thể loại trước mời thêm bài viết !!!',
                ];
            }
            return [
                'status' => 1,
                'html_view' => view('admin.post.create', compact('categories'))->render(),
            ];
            // return view('admin.post.create', compact('categories'));
    }

    public function store(Request $request, Post $post){
        // dd($request->all());
        $category_info  = Category::find($request->category);
        if (!$category_info) {
            return [
                'status' => 0,
                'message' => 'Bạn chưa có thể loại cho bài viết, mời bạn quay lại thêm category trước khi thêm bài viết!!!!'
            ];
        }
        $namefile = '';
        $checkUpload = false;
        // dd($request->hasFile('image'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $namefile = $file->getClientOriginalName();

            if ($file->getError() ==0) {
                if($file->move("uploads/posts",$namefile)){
                    $checkUpload = true;
                }
            }

        }

        // dd($request->category);
        if (!$checkUpload && $namefile=='') {
            return [
                'status' => 0,
                'message' => 'Bạn chưa chọn file ảnh, mời bạn chọn lại!!!'
            ];
        }

        $dataIn = [
            'title' => $request->title,
            'avatar' => $request->image,
            'category_id' => $request->category,
            'content' => $request->content,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];


        $saveUp = $post->InsertPost($dataIn);

        if (!$saveUp) {
            return [
                'status' => 0,
                'message' => 'Bạn chưa thêm thành công bài viêt này !',
            ];
        }

        $listPost = Post::all();
        // dd(view('admin.post.list_post', compact('listPost'))->render());
        return [
            'status' => 1,
            'message' => 'Bạn lưu thành công bài viết !',
            'view_html' => view('admin.post.list_post', compact('listPost'))->render(),
            // 'modal_add' => view('admin.post.create', compact(varname))->render(),
        ];
    	// $data = [
    	// 	''
    	// ]
    }
}
