<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Model\Banner;
use App\Model\Comment;
use App\Model\Post;
use Auth;
use App\Http\Requests\Comment\CommentRequest;

class CommentController extends Controller
{
    protected $comment_model;

    public function __construct(){
        $this->comment_model = new Comment();
    }
    public function index(){
    	
    	return view('admin.comment.index');
    }

    public function loadDataTable(){
        $list_comment = Comment::with('user')->get();
        // dd($list_comment);
        return view('admin.comment.datatable', compact('list_comment'));
    }

    public function add(){
        $list_post = Post::all();
        // dd($list_post);
        return view('admin.comment.add', compact('list_post'));
    }

    public function store(CommentRequest $request){
        $insert = $this->comment_model;

        $insert->post_id = $request->post_id;
        $insert->content = $request->content;
        $insert->user_id = Auth::id();

        if ($insert->save()) {
            return $this->Success('Bạn đã lưu thành công');
        }

        return $this->Error('Bạn đã lưu thất bại');

    }

    public function edit(Request $request){
        // dd($request->all());
        $find_comment = $this->comment_model->with('post')->find($request->id);
        // dd($find_comment);
        return view('admin.comment.edit', compact('find_comment'));
    }

    public function update(CommentRequest $request){
        $update = $this->comment_model->find($request->id);

        $update->post_id = $request->post_id;
        $update->content = $request->content;

        if($update->save()){
             return $this->Success('Bạn đã chỉnh sửa thành công');
        }

        return $this->Error('Sửa thất bại');

    }

    public function delete(Request $request){
        $find_comment = $this->comment_model->find($request->id);
        // dd($find_comment);
        return view('admin.comment.delete', compact('find_comment'));
    }

    public function destroy(Request $request){
       $find_comment = $this->comment_model->find($request->id);

       if ($find_comment->delete()) {
            return $this->Success('Bạn đã xóa thành công');
       }
       return $this->Error('Bạn đã thất bại');
    }

    public function Success($message){
        return [
            'status' => 1,
            'message' => $message,
        ];
    }

    public function Error($message){
        return [
            'status' => 0,
            'message' => $message,
        ];
    }
}
