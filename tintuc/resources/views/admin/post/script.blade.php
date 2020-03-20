<script>
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

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
    });
	function CKEditorAdd(){
		var content_add = $('#content_add');
		for(instance in CKEDITOR.instance){
			CKEDITOR.instances[content_add].updateElement();
			// CKEDITOR.instances['image'].setData(html)
		}
	}

	function AddPost(){
		var url = '{{route('admin.post.store')}}';
		// console.log(url);
		var formData = new FormData();
		// CKEDITOR.instances['content_add'].setData(html);
		// CKEDITOR.replace('textarea-notes');
		// var data = CKEDITOR.instances.content_add.getData();
		formData.append('image', $('#image_add')[0].files[0]);
		formData.append('title', $('#title_add').val());
		formData.append('content', $('#content_add').val());

		
		CKEditorAdd();
		$.ajax({
			type : 'post',
			url : url,
			data: formData,
			processData: false,  // tell jQuery not to process the data
      		contentType: false,  // tell jQuery not to set contentType
			success : function(response){
				toastr.success('ok');
			}, error : function(jqXHR, textStatus, errorThrow){
				toastr.error('Có chuyện gì đó đang xảy ra ?');
			}
		});
	}

</script>