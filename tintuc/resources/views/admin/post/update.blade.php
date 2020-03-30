<style>
	
</style>
<div class="modal fade" id="modal-up">
	<div class="modal-dialog" style="min-width: 70%">
		<div class="modal-content">

			<form id="form-add" method="POST" role="form" enctype="multipart/form-data">
				@csrf
				<div class="modal-header" id="ok">
					<h4 class="modal-title">Sửa bài viết</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="">Tên bài viết</label>
						<input name="title" type="text" class="form-control" value="{{$postInfo->title}}" id="title_up" placeholder="Tên thể loại">
					</div>
					<div class="form-group">
						<label for="">Ảnh tiêu đề</label>
						<input name="image" type="file" id="image_Up" class="form-control" placeholder="Tên thể loại">
						<p></p>
						<img style="width: 100%" id="show_img" src="uploads/posts/{{$postInfo->avatar}}" alt="your image" />
					</div>
					<div class="form-group">
						<label for="">Chọn thể loại</label>
						<select class="form-control" name="category" id="category_Up">
							@foreach($categories as $key => $category)
								<option {{$categoryInfo->id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name_cat}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea id="content_up" name="content" class="form-control" value="" >{{$postInfo->content}}</textarea>
						{{-- <textarea id="content_add" name="content" class="form-control" ></textarea> --}}

					</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button onclick="EditPost({{$postInfo->id}})" type="button" class="btn btn-warning">Update</button>
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

	CKEDITOR.replace( 'content_up',
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

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#show_img').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#image_Up").change(function(){
		readURL(this);
	});
</script>