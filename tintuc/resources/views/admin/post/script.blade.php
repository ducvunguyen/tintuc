<script>
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
    });

	function initValiadate() {
		$( "#form-add" ).validate({
			rules: {
				title: "required",
				image: "required",
				category: "required",
				content: "required",
			},
			messages: {
				title: "Please enter the title",
				image: "Please select an image",
				category: "Please enter a valid email address",
				content: "Please accept our policy",
			},
			submitHandler: function(form) {
		      AddPost();
		    }
		});
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
					initValiadate();
					$('#modal-add').modal('show');
				}
			},error : function(jqXHR, errorThrow, textStatus){
				toastr.error('Có lỗi xảy ra');
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
			enctype: 'multipart/form-data',
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

	function modalDelete(id){
		var url = '{{route("admin.post.delete-modal", ":id")}}';
		url = url.replace(":id", id);
		// console.log(url);

		$.ajax({
			type: 'get',
			url: url,
			success : function(response){
				if(response.status == 0){
					toastr.error(response.message);
				}else{
					$('#modal-del-div').html(response.html_view);
					$('#modal-del').modal('show');
				}
			},
			error: function(jqXHR, errorThrow, textStatus){
				toastr.error('Có chuyện gì đó đang xảy ra ?');	
			}
		});
	}

	function DeletePost(id){
		// console.log(id);
		var url = '{{route("admin.post.delete", ":id")}}';
		url = url.replace(":id", id);
		// console.log(url);

		$.ajax({
			type : 'post',
			url : url,
			success : function(response){
				// alert('ok');
				if (response.status === 0) {
					toastr.error(response.message);
				}else{
					toastr.success(response.message);
					$('#reload').html(response.html_view);
					$('#modal-del').modal('hide');
				}
			},
			error : function(jqXHR, errorThrow, textStatus){
				toastr.error('Có chuyện gì xảy ra ?');
			}
		});
	}

	function modalEdit(id){
		// console.log(id);
		var url = '{{route("admin.post.edit-modal", ":id")}}';
		url = url.replace(":id", id);
		// console.log(url);

		$.ajax({
			url : url,
			type: 'get',
			success: function(response){
				// toastr.success('ok');
				if (response.status ==0) {
					toastr.error(response.message);
				}
				else{
					$('#modal-edit-div').html(response.modal_edit);
					$('#modal-up').modal('show');
				}
			}, error : function(jqXHR, textStatus, errorThrow){
				toastr.error('Có chuyện gì đó đang xảy ra ?');
			}
		});
	}

	function EditPost(id){
		// console.log(id);
		var url = '{{route("admin.post.update", ":id")}}',
		url = url.replace(":id", id);

		var formData = new FormData();
		var content = CKEDITOR.instances['content_up'].getData();


		formData.append('title', $('#title_up').val());
		formData.append('image', $('#image_Up')[0].files[0]);
		formData.append('category', $('#category_Up').val());
		formData.append('content', content);

		$.ajax({
			type: 'post',
			url : url,
			data: formData,
			enctype: 'multipart/form-data',
			processData: false,  // tell jQuery not to process the data
      		contentType: false,  // tell jQuery not to set contentType
			success : function(response){
				// toastr.success('ok');
				if (response.status == 0) {
					toastr.error(response.message);
				}else{
					toastr.success(response.message);
					$('#reload').html(response.view_html);
					$('#modal-up').modal('hide');
				}
			}, error : function(jqXHR, textStatus, errorThrow){
				toastr.error('Có chuyện gì đó đang xảy ra?');
			}
		});
	}

	function modalView(id){
		var url = '{{route("admin.post.show", ":id")}}';
		url = url.replace(":id", id);
		// console.log(url);

		$.ajax({
			type : 'get',
			url : url,
			success: function(response){
				// toastr.success('ok');
				if (response.status === 0) {
					toastr.error(response.message);
				}else{
					$('#modal-show-div').html(response.modal_view);
				$('#modal-show').modal('show');
				}			
			},error : function(jqXHR, textStatus, errorThrow){
				toastr.error('Có chuyện gì đó đang xảy ra');
			}
		});
	}

</script>