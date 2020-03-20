<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Http\Requests\Cate\AddCategory;
use Auth;

class CategoryController extends Controller
{
    public function index(){
    	$listCate = Category::all();

    	return view('admin.category.index', compact('listCate'));
    }

    // public function create(){
    // 	return view('admin.category.create');
    // }

    public function store(Request $request, Category $saveCate){
    	$name_cate = $request->name_cat;
        
        // validate
        if (empty($name_cate)) {
            return [
                'status' => 0,
                'message' => 'Chưa có tên thể loại',
            ];
        }
        if (strlen($name_cate) > 1000) {
            return [
                'status' => 0,
                'message' => 'Vui lòng nhập ít hơn 1000 ký tự',
            ];
        }

// save
        $saveData = [
            'name_cat' =>$name_cate,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];

        $save = $saveCate->saveCategory($saveData);

        if(!$save){
           return [
                'status' => 0,
                'message' => 'Lưu thất bại',
           ];
        }

        $listCate = Category::all();
        return [
            'status' => 1,
            'message' => 'Lưu thể loại thành công',
            'table_html' => view('admin.category.ajax_list_data', compact('listCate'))->render()
        ];
    	// if ($save) {
    	// 	# code...
    	// 	return redirect()->route('admin.category.index');
    	// }
    	// else{
    	// 	dd('fail');
    	// }
    }

    public function getEditModal($id){
        // dd($id);
    	$cate_info = Category::find($id);
        if(empty($cate_info)){
           return [
                'status' => 0,
                'message' => 'Thể loại không tồn tại',
           ];
        }
        return [
                'status' => 1,
                'html_modal' => view('admin.category.update', compact('cate_info'))->render()
           ];
    }

    public function update(Request $request, $id){
    	// dd($request->all());
        $cate_info = Category::find($id);
        if(empty($cate_info)){
           return [
                'status' => 0,
                'message' => 'Thể loại không tồn tại',
           ];
        }

    	$name_cate = $request->name_cat;

        // validate
        if (empty($name_cate)) {
            return [
                'status' => 0,
                'message' => 'Chưa có tên thể loại',
            ];
        }
        if (strlen($name_cate) > 1000) {
            return [
                'status' => 0,
                'message' => 'Vui lòng nhập ít hơn 1000 ký tự',
            ];
        }

    	$saveData = [
    		'name_cat' => $name_cate,
    		'created_by' => Auth::user()->id,
    		'updated_by' => Auth::user()->id,
    	];

    	$save = $cate_info->saveUpdate($saveData, $id);

        if (!$save) {
            return [
                'status' => 0,
                'message' => 'Sửa thất bại',
            ];
        }

        $listCate = Category::all();
        return [
            'status' => 1,
            'message' => 'Sửa thành công',
            'table_html' => view('admin.category.ajax_list_data', compact('listCate'))->render()
        ];
    }

    public function getDeleteModal($id){
        $infoCate = Category::find($id);
        if(empty($infoCate)){
            return [
                'status' => 0,
                'message' => 'Không tìm thấy',
            ];
        }

        return [
            'status' => 1,
            'html_modal' => view('admin.category.delete', compact('infoCate'))->render()
        ];
    }

    public function delete($id){
    	$categoryInfor = Category::find($id);
    	if(empty($categoryInfor)){
    		return [
    			'status' => 0,
    			'message' => 'Thể loại không tồn tại'
    		];
    	}

    	$is_deleted = $categoryInfor->delete();
    	if (!$is_deleted) {
    		return [
    			'status' => 0,
    			'message' => 'Xóa thể loại thất bại'
    		];
    	}

    	$listCate = Category::all();
    	return [
			'status' => 1,
			'message' => 'Xóa thể loại thành công',
			'table_html' => view('admin.category.ajax_list_data', compact('listCate'))->render()
		];

    }
}
