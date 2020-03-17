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

    public function store(AddCategory $request, Category $saveCate){
        // dd(1);
    	$name_cate = $request->name_cat;

    	$saveData = [
    		'name_cat' =>$name_cate,
    		'created_by' => Auth::user()->id,
    		'updated_by' => Auth::user()->id,
    	];

    	$save = $saveCate->saveCategory($saveData);
        
        if (empty($name_cate)) {
            return [
                'status' => 0,
                'message' => 'Chưa có tên thể loại',
            ];
        }

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

    public function edit($id){
    	$findCateId = Category::findOrFail($id);
    	// return view('admin.category.update', compact('findCateId'));
        if($findCateId){
            return [
                'status' => 1,
                'data' => $findCateId,
            ]
        }
    }
    public function update(Request $request, Category $category, $id){
    	// dd($id);
    	$name_cat = $request->name_cat;

    	$saveData = [
    		'name_cat' => $name_cat,
    		'created_by' => Auth::user()->id,
    		'updated_by' => Auth::user()->id,
    	];

    	$save = $category->saveUpdate($saveData, $id);
    	if ($save) {
    			# code...
    		return redirect()->route('admin.category.index');
    	}else{
    		dd('update that bai');
    	}
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
