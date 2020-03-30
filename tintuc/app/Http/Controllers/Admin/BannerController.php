<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Banner;
use Auth;

class BannerController extends Controller
{
    public function index(){
    	$listBanner = Banner::all();
    	return view('admin.banner.index', compact('listBanner'));
    }

    public function store(Request $request, Banner $banner)
    {

    	$url_name = Banner::select('name_url')->get();
        $date = date("Ymdhisa");

	    $checkUpload = false;
        $namefile = '';
        if($request->hasFile('image')){
            $file = $request->file('image');		
            $namefile = $file->getClientOriginalName();
            $namefile = $date.$namefile;
            if($file->getError() == 0){
                if($file->move("uploads/banners",$namefile)){
                    $checkUpload = true;
                }
            }
        }



	    if(!$checkUpload && $namefile == ''){

	        return [
	        	'status' => 0,
	        	'message' => 'checkUpload fail'
	        ];
	    } 
	    else {
	            // insert data
	    	// dd($namefile);
	    	$dataInsert = [
	    		'name_url' => $namefile,
                'user_id' => Auth::id(),
	    		'created_by' => Auth::user()->id,
	    		'updated_by' => Auth::user()->id,
	    	];

	    	$save = $banner->saveInsert($dataInsert);
	    	// dd($namefile);
	    	if (empty($namefile)) {
	    		return [
	    			'status' => 0,
	    			'message' =>'Ban chua chon file',
	    		];
	    	}

	    	if (empty($save)) {
	    		return [
	    			'status' => 0,
	    			'message' => 'Chua luu duoc banner',
	    		];
	    	}

	    	if(!$save){
	    		return [
	    			'status' => 0,
	    			'message' => 'Banner khong ton tai',
	    		];
	    	}

	    	$listBanner = Banner::all();
	    	return[
	    		'status' =>1,
	    		'message' => 'Thêm mới thành công',
	    		'html_view' => view('admin.banner.listbanner', compact('listBanner'))->render(),
	    	];
	    }
    }

    public function getDeleteModal($id){
    	// dd($id);
    	$getBannerInfo = Banner::find($id);

    	// dd($getBannerInfo);
    	if (empty($getBannerInfo)) {
    		return [
    			'status' => 0,
    			'message' => 'Id banner không có',
    		];
    	}

    	return [
    		'status' => 1,
    		'message' => 'Tim thành công',
    		'modal_html' => view('admin.banner.delete', compact('getBannerInfo'))->render()
    	];
    }

    public function delete($id){
    	$getBannerInfo = Banner::find($id);
        $user = Auth::user();
        if ($user->can('banner', $getBannerInfo)) {
            $namefile = $getBannerInfo->name_url;
            $patchFile = public_path().'/uploads/banners/'.$namefile;

            $deleteBanner = $getBannerInfo->delete();

            if(empty($getBannerInfo)){
                return [
                    'status' => 0,
                    'message' => 'Không tìm thấy ID banner !!!!'
                ];
            }
            if (empty($deleteBanner)) {
                return [
                    'status' => 0,
                    'message' => 'Không thể xóa được do id Banner không có !!!!'
                ];
            }
            if (!$deleteBanner) {
                return [
                    'status' => 0,
                    'message' => 'Chưa xóa được ảnh Banner này !!!!!'
                ];
            }
            $listBanner = Banner::all();
        // dd(view('admin.banner.listbanner', compact('listBanner'))->render());
            return [
                'status' => 1,
                'message' => 'Xóa thành công',
                'delete_path' => unlink($patchFile),
                'html_view' => view('admin.banner.listbanner', compact('listBanner'))->render(),
            ];
        }
    	return [
            'status' => 0,
            'message' => 'Bạn không có quyền truy câp banner này!',
        ];
    }

    public function getEditModal($id){
    	$getBannerInfo = Banner::find($id);
        $user = Auth::user();
        if ($user->can('banner', $getBannerInfo)) {
            if (empty($getBannerInfo)) {
                return [
                    'status' => 0,
                    'message' => 'ID Banner rỗng',
                ];
            }
            if (!$getBannerInfo) {
                return [
                    'status' => 0,
                    'message' => 'Không thất id Banner'
                ];
            }
            return [
                'status' => 1,
                'modal_edit' => view('admin.banner.edit', compact('getBannerInfo'))->render(),
            ];
        }
        return [
            'status' => 0,
            'message' => 'Bạn không có quyền truy câp banner này!',
        ];

    	
    }

    public function update(Request $request, Banner $banner, $id){
    	// dd($request->all());
    	// dd($id);
    	$getBannerInfo = Banner::find($id);

    	$url_name = Banner::select('name_url')->get();
    	// dd($BannerInfo);
    	



	    $checkUpload = false;
        $namefile = '';
        if($request->hasFile('image_banner')){
            $file = $request->file('image_banner');
            // dd($file);
            // lay ten file           		
            $namefile = $file->getClientOriginalName();
            foreach ($url_name as $key => $url) {
            	if ($namefile == $url->name_url) {
            		
            		return [
            			'status' => 0,
            			'message' => 'Ảnh này đã có rồi bạn nên chọn ảnh khác !!!',
            		];
            	}
            }

            if($file->getError() == 0){
                // upload
                if($file->move("uploads/banners",$namefile)){
                    $checkUpload = true;
                }
            }
        }
        // dd($namefile);
       
	    // dd($dataInsert);
        if($namefile == null){
        	$data = [
	    		'name_url' => $getBannerInfo->name_url,
	    		'created_by' => Auth::user()->id,
	    		'updated_by' => Auth::user()->id,
	    	];
        	$save = $getBannerInfo->update($data);
        	// dd();
        	if(empty($save)){
        		return [
        			'status' => 0,
        			'message' => 'Không thể lưu  Banner này',
        		];
        	}
        	if (!$save) {
        		return [
        			'status' => 0,
        			'message' => 'Không tìm thấy id Banner để lưu',
        		];
        	}
        	else{
        		return [
        			'status' => 1,
        			'message' => 'Lưu thành công',
        		];
        	}
        }

        // dd(1
	    if(!$checkUpload && $namefile == ''){

	        return [
	        	'status' => 0,
	        	'message' => 'checkUpload fail',
	        ];
	    } 
	            // insert data
    	   // dd($namefile);
    	$findImg = $getBannerInfo->name_url;
    	// dd($findImg);
    	$path = public_path()."/uploads/banners/" .$findImg;
    	// $path = public_path().'/uploads/banners/'.$namefile;
        // dd($path);
    	$dataUp = [
    		'name_url' => $namefile,
    		'created_by' => Auth::user()->id,
    		'updated_by' => Auth::user()->id,
    	];
    	// dd($dataUp);
        $saveUP = $banner->saveUpdate($id, $dataUp);

    	
    	// dd($namefile);
    	// dd($save);

    	if(!$saveUP){
    		return [
    			'status' => 0,
    			'message' => 'Lưu thất bại !!!!',
    		];
    	}

    	$listBanner = Banner::all();
    	return[
    		'status' =>1,
    		'message' => 'Thêm mới thành công',
    		'delete_file' => unlink($path),
    		'html_view' => view('admin.banner.listbanner', compact('listBanner'))->render(),
    	]; 	    
    }
  
}
