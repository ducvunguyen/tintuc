<script>
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
    });
	var img = $('<img />');
	function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                
                img.attr('src', e.target.result);
                $('#render_img').append(img);

            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#img_ins").change(function(){
        readURL(this);
    });

    

    function insertBanner(){
    	var url = '{{route("admin.banner.store")}}';
    	console.log(url);

    	var formData = new FormData();
		// Attach file
		formData.append('image', $('#img_ins')[0].files[0]);
		// console.log(formData); return false; 

    	$.ajax({
    		type: 'post',
    		url: url,
    		enctype: 'multipart/form-data',
    		data: formData,
    		contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
    		processData: false, 
    		success: function(response){
    			if (response.status == 0) {
    				toastr.error(response.message);
    			}else{
    				toastr.success(response.message);
    				$('#banner_html').html(response.html_view);
    				$('#modal-add').modal('hide');
    			}
    		},
    		error : function(jqXHR, textStatus, errorThrow){
    			toastr.error('Co chuyen gi do dang say ra?'); 
    		}
    	});
    }

    function ModalBannerDelete(id){
    	var url = '{{route("admin.banner.delete-modal", ":id")}}';
    	url = url.replace(":id", id);
    	// console.log(url);
    	$.ajax({
    		type: 'get',
    		url : url,
    		success: function(response){
    			if (response.status === 0) {
    				toastr.error(response.message);
    			}
    			else{
    				$('#delete-modal').html(response.modal_html);
                    $('#modal-delete').modal('show');
    			}
    		},
    		error: function(jqXHR, textStatus, errorThrow){
    			toastr.error('Có chuyện gì đó đang xảy ra ?');
    		}
    	});
    }
    function deleteBanner(id){
        var url = '{{route("admin.banner.delete", ":id")}}';
        url = url.replace(":id", id);

        $.ajax({
            type: 'post',
            url : url,
            success: function(response){
                if (response.status === 0) {
                    toastr.error(response.message);
                }else{
                    toastr.success(response.message);       
                    $('#banner_html').html(response.html_view);
                    $('#modal-delete').modal('hide');
                    // $('div.modal-backdrop').removeClass('modal-backdrop');
                }
            },
            error: function(jqXHR, textStatus, errorThrow){
                toastr.error('Có chuyện gì đó đang xảy ra');
            }
        });
    }

    function ModalBannerEdit(id){
        // console.log(id);
        var url = '{{route("admin.banner.edit-modal", ":id")}}',
        url = url.replace(":id", id);
        // console.log(url);

        $.ajax({
            type: 'get',
            url: url,
            success : function(response){
                if (response.status == 0) {
                    toastr.error(response.message);
                }
                else{
                    $('#edit-modal').html(response.modal_edit);
                    $('#modal-edit').modal('show');
                }
            },error : function(jqXHR, textStatus, errorThrow){
                toastr.error('Có chuyển gì đang xảy ra?');
            }
        });
    }

    function editBanner(id){
        var url = '{{route("admin.banner.update", ":id")}}',

        url = url.replace(":id", id);
        // console.log(url);
        // var data = new FormData();
        // // Attach file
        // data.append('image', $('#img_inst')[0].files[0]);
        var data = new FormData();
        data.append('image_banner', $('#image_banner')[0].files[0]);
        console.log(url);
        // console.log(data);return false;

        $.ajax({
            type : 'post',
            url: url,
            data: data,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            success : function(response){
                if (response.status === 0) {
                    toastr.error(response.message);
                }
                else{
                    toastr.success(response.message);
                    $('#banner_html').html(response.html_view);
                    $('#modal-edit').modal('hide');
                    $('div.modal-backdrop').removeClass('modal-backdrop');
                }
            }, error : function (jqXHR, errorThrow, textStatus){
                toastr.error('Có chuyện gì đó đang xảy ra ?');
                
            }
        });
    }
</script>