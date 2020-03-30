<div class="modal fade" id="modal-add">
	<div class="modal-dialog" style="min-width: 70%">
		<div class="modal-content">
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<form id="form-add" method="POST" role="form" enctype="multipart/form-data">
				<div class="modal-header" id="ok">
					<h4 class="modal-title">Thêm bài biết</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="">Tên bài viết</label>
						<input name="title" type="text" class="form-control" id="title_add" placeholder="Tên thể loại">
					</div>
					<div class="form-group">
						<label for="">Ảnh tiêu đề</label>
						<input name="image" type="file" id="image_add" class="form-control" placeholder="Tên thể loại">
						<div id="render_img"></div>
					</div>
					<div class="form-group">
						<label for="">Chọn thể loại</label>
						<select class="form-control" name="category" id="category_add">
							@foreach($categories as $key => $category)
								<option value="{{$category->id}}">{{$category->name_cat}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Nội dung</label>
						<input id="content_add" name="content" class="form-control" value="" />
						{{-- <textarea id="content_add" name="content" class="form-control" ></textarea> --}}

					</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>

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

	
	function CKEditorAdd(){
		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
	}
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

	$("#image_add").change(function(){
		readURL(this);
	});
</script>