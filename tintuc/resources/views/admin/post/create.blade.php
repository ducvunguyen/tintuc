<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">

			<form id="form-add" method="POST" role="form">
				@csrf
				<div class="modal-header" id="ok">
					<h4 class="modal-title">Post</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="">Tên bài viết</label>
						<input name="title" type="text" class="form-control" id="title_add" placeholder="Tên thể loại">
					</div>
					<div class="form-group">
						<label for="">Image</label>
						<input name="image" type="file" id="image_add" class="form-control" placeholder="Tên thể loại">
					</div>
					<div class="form-group">
						<label for="">Nội dung</label>
						<input id="content_add" name="content" class="form-control" />
						{{-- <textarea id="content_add" name="content" class="form-control" ></textarea> --}}

					</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button onclick="AddPost()" type="button" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>

