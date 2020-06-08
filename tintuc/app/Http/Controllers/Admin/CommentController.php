<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\Post;
use Auth;
use App\Http\Requests\Comment\CommentRequest;
use App\Http\Lib\MessageLib;

class CommentController extends Controller
{
    protected $comment_model;
    protected $mess;

    public function __construct(){
        $this->comment_model = new Comment();
        $this->mess = new MessageLib();
    }
    public function index(){
    	
    	return view('admin.comment.index');
    }

    public function loadDataTable(){
        $list_comment = Comment::with('user')->get();
        return view('admin.comment.datatable', compact('list_comment'));
    }

    public function add(){
        $list_post = Post::all();
        if (count($list_post) > 0) {
            return view('admin.comment.add', compact('list_post'));
        }
        return $this->mess->Error('Không có bài viết nào cả');
    }

    public function store(CommentRequest $request){
        $insert = $this->comment_model;

        $insert->post_id = $request->post_id;
        $insert->content = $request->content;
        $insert->user_id = Auth::id();

        if ($insert->save()) {
            return $this->mess->Success('Bạn đã lưu thành công');
        }

        return $this->mess->Error('Bạn đã lưu thất bại');

    }

    public function edit(Request $request){
        $find_comment = $this->comment_model->with('post')->find($request->id);
        return view('admin.comment.edit', compact('find_comment'));
    }

    public function update(CommentRequest $request){
        $update = $this->comment_model->find($request->id);

        $update->post_id = $request->post_id;
        $update->content = $request->content;

        if($update->save()){
            return $this->mess->Success('Bạn đã chỉnh sửa thành công');
        }

        return $this->mess->Error('Sửa thất bại');

    }

    public function delete(Request $request){
        $find_comment = $this->comment_model->find($request->id);
        return view('admin.comment.delete', compact('find_comment'));
    }

    public function destroy(Request $request){
       $find_comment = $this->comment_model->find($request->id);

       if ($find_comment->delete()) {
            return $this->mess->Success('Bạn đã xóa thành công');
       }
       return $this->mess->Error('Sửa thất bại');
    }

}
