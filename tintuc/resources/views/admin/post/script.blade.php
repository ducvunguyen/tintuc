<script>
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
    });

	config = {};
	config.entities_latin = false;
	config.language = 'vi';
	config.uiColor = '#AADC6E';

	// CKEDITOR.instances.content_add.setData(html);

	CKEDITOR.replace( 'content_add',
	{
		filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
		filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
		filebrowserBrowseUrl: '/browser/browse.php?type=Images',
		filebrowserUploadUrl: '/uploader/upload.php?type=Files'
	});

	
	function CKEditorAdd(){
		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
	}

	function modalAdd(){
		// console.log(1);
		var url = '{{route("admin.post.create")}}';
		// console.log(url);

		$.ajax({
			type : 'get',
			url: url,
			success : function(response){
				if (response.status ===0) {
					toastr.error(response.message);
				}else{
					$('#modal-add-div').html(response.html_view);
					$('#modal-add').modal('show');
				}
			},error : function(jqXHR, errorThrow, textStatus){

			}
		});
	}
	function AddPost(){
		var url = '{{route('admin.post.store')}}';
		// console.log(url);
		var formData = new FormData();
		// var content = $('#content_add').val();
		// var editor = CKEDITOR.editor.replace('content_add');
		var value = CKEDITOR.instances['content_add'].getData();
		// console.log(value);

		formData.append('image', $('#image_add')[0].files[0]);
		formData.append('title', $('#title_add').val());
		formData.append('category', $('#category_add').val());
		formData.append('content', value);

		
		CKEditorAdd();
		$.ajax({
			type : 'post',
			url : url,
			data: formData,
			processData: false,  // tell jQuery not to process the data
      		contentType: false,  // tell jQuery not to set contentType
			success : function(response){
				if (response.status ==0) {
					toastr.error(response.message);
				}else{
					toastr.success(response.message);
					// $('#modal-add-div').html(response.modal_add);
					$('#reload').html(response.view_html);
					$('#modal-add').modal('hide');
				}
			}, error : function(jqXHR, textStatus, errorThrow){
				toastr.error('Có chuyện gì đó đang xảy ra ?');
			}
		});
	}

</script>