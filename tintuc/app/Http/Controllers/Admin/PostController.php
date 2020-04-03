<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Category;
use App\Model\Permission;
use App\Http\Requests\Post\CreatePostRequest;
use Auth;
use DB;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(){
        $users = DB::table('roles')
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->where('role_user.user_id', Auth::id())
            ->select('permission_role.permission_id')
            ->get()
            ->pluck('permission_id')
            ->toArray();

        $getPermissionId = Permission::find(16)->id;
        if (in_array($getPermissionId, $users)) {
            $listPost = Post::with('creator', 'editor')->get();

            return view('admin.post.index', compact('listPost'));
        }
        return 'Bạn không có quyền, rất xin lỗi vì đã làm phiền';
    	 
    }

    public function create(){
        // dd(1);
        $users = DB::table('roles')
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->where('role_user.user_id', Auth::id())
            ->select('permission_role.permission_id')
            ->get()
            ->pluck('permission_id')
            ->toArray();

        $getPermissionId = Permission::find(10)->id;
        if (in_array($getPermissionId, $users)) {
            $categories  = Category::all();

            if (count($categories) == 0) {
                return [
                    'status' => 0,
                    'message' => 'Bạn chưa có thể loại nào, bạn phải thêm thể loại trước mời thêm bài viết !!!',
                ];
            }
            return [
                'status' => 1,
                'html_view' => view('admin.post.create', compact('categories'))->render(),
            ];
        }
            // return view('admin.post.create', compact('categories'));
    }

    public function store(CreatePostRequest $request, Post $post){

        $date = date("Ymdhisa");
        // dd($date);
        // $chageName = rand().rand();

        // dd($chageName);
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
            // $new_name = $chageName . "_" . $file;
            // dd($file);
            $namefile = $file->getClientOriginalName();
            $namefile = $date.$namefile;
            // dd($namefile);
            if ($file->getError() ==0) {
                if($file->move("uploads/posts",$namefile)){
                    $checkUpload = true;
                }
            }

        }
        // dd($namefile);
        // dd($request->category);
        if (!$checkUpload && $namefile=='') {
            return [
                'status' => 0,
                'message' => 'Bạn chưa chọn file ảnh, mời bạn chọn lại!!!'
            ];
        }

        $dataIn = [
            'title' => $request->title,
            'avatar' => $namefile,
            'category_id' => $request->category,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];


        $saveIn = $post->InsertPost($dataIn);

        if (!$saveIn) {
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

    public function getDeleteModal($id){
        // dd($id);
        $postInfo = Post::find($id);

        if (!$postInfo) {
           return [
                'status' => 0,
                'message' => 'Không tim thấy thông tin bài post !!!',
           ];
        }
        return [
            'status' => 1,
            'html_view' => view('admin.post.delete', compact('postInfo'))->render()
        ];
    }

    public function delete($id){
        $users = DB::table('roles')
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->where('role_user.user_id', Auth::id())
            ->select('permission_role.permission_id')
            ->get()
            ->pluck('permission_id')
            ->toArray();
        $getPermissionId = Permission::find(14)->id;

        $postInfo = Post::find($id);

        if (in_array($getPermissionId, $users)) {
            $findImg = $postInfo->avatar;
        // $patchFile = public_path().'/uploads/banners/'.$namefile;
            $patchFile = public_path().'/uploads/posts/'.$findImg;
            $deletePost = $postInfo->delete();

            if (!$deletePost) {
                return [
                    'status' => 0,
                    'message' => 'Bạn vẫn chưa xóa được cái ảnh này !!'
                ];
            }

            $listPost = Post::with('creator', 'editor')->get();
            return [
                'status' => 1,
                'message' => 'Xóa thành công !!!',
                'unlink' => unlink($patchFile),
                'html_view' => view('admin.post.list_post', compact('listPost'))->render(),
            ];
        }
        return [
            'status' => 0,
            'message' => 'Bạn không có quyền cho bài cho bài viết này',
        ];
        
    }

    public function getEditModal($id){
        // dd($id);
        $users = DB::table('roles')
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->where('role_user.user_id', Auth::id())
            ->select('permission_role.permission_id')
            ->get()
            ->pluck('permission_id')
            ->toArray();
        $getPermissionId = Permission::find(13)->id;

        $postInfo = Post::find($id);
        if (in_array($getPermissionId, $users)) {
            $cate_id = $postInfo->category_id;
            $categoryInfo = Category::find($cate_id);
            $categories  = Category::all();
        // dd($categoryInfo);
            if (!$categoryInfo) {
                return [
                    'status' => 0,
                    'message' => 'Không tìm thấy thể loại bài viết !!!!'
                ];
            }

            return [
                'status' => 1,
                'modal_edit' => view('admin.post.update', compact('categoryInfo', 'categories', 'postInfo'))->render()
            ];
        }
        return [
            'status' => '0',
            'message' => 'Bạn không có quyền cho bài viết này!!!',
        ];
        
    }

    public function update(Request $request, Post $post ,$id){
        // dd($request->all());

        $namefile = '';
        $checkUpload = false;
        // dd($request->hasFile('image'));
        $chageName = rand().rand();

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $namefile = $file->getClientOriginalName();
            $namefile = $chageName.$namefile;
            if ($file->getError() ==0) {
                if($file->move("uploads/posts",$namefile)){
                    $checkUpload = true;
                }
            }

        }
        $postInfo = Post::find($id);
        $avatar = $postInfo->avatar;
        // dd($avatar);
        if ($namefile == null) {

             $dataUp = [
                'title' => $request->title,
                'avatar' => $avatar,
                'category_id' => $request->category,
                'content' => $request->content,
                'updated_by' => Auth::user()->id,
            ];
            $saveUp = $post->UpdatePost($id, $dataUp);
            if (!$saveUp) {
                return [
                    'status' => 0,
                    'message' => 'Chỉnh sửa thất bại!!!',
                ];
            }

            $listPost = Post::all();
            return [
                'status' => 1,
                'message' => 'Chỉnh sửa thành công !!',
                'view_html' => view('admin.post.list_post', compact('listPost'))->render(),
            ];

        }
        if (!$checkUpload && $namefile=='') {
            return [
                'status' => 0,
                'message' => 'Bạn chưa chọn file ảnh, mời bạn chọn lại!!!'
            ];
        }

        $dataIn = [
            'title' => $request->title,
            'avatar' => $namefile,
            'category_id' => $request->category,
            'content' => $request->content,
            'updated_by' => Auth::user()->id,
        ];


        $saveUp = $post->UpdatePost($id, $dataIn);

        if (!$saveUp) {
            return [
                'status' => 0,
                'message' => 'Bạn chưa thêm thành công bài viêt này !',
            ];
        }
        $patchFile = public_path().'/uploads/posts/'.$avatar;
        $listPost = Post::all();
        // dd(view('admin.post.list_post', compact('listPost'))->render());
        return [
            'status' => 1,
            'message' => 'Bạn lưu thành công bài viết !',
            'unlink' => unlink($patchFile),
            'view_html' => view('admin.post.list_post', compact('listPost'))->render(),
        ];
        
    }

    public function show($id){
        // dd($id);
        $users = DB::table('roles')
            ->join('role_user', 'roles.id', '=', 'role_user.role_id')
            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
            ->where('role_user.user_id', Auth::id())
            ->select('permission_role.permission_id')
            ->get()
            ->pluck('permission_id')
            ->toArray();
        $getPermissionId = Permission::find(15)->id;

        $postInfo = Post::with('category')->find($id);
        // $this->authorize($postInfo, 'view');
        if (in_array($getPermissionId, $users)) {
            // dd($getPermissionId);
            if (!$postInfo) {
                return [
                    'status' => 0,
                    'message' => 'Không tìm thấy đối tượng',
                ];
            }
            return [
                'sattus' => 1,
                'modal_view' => view('admin.post.show', compact('postInfo'))->render(),
            ];
        } 
        return [
            'status' => 0,
            'message' => 'Bạn không phải là người viết bài này nên banj xe không có quyền !!!!',
        ];
        // dd($postInfo);

    }
}
