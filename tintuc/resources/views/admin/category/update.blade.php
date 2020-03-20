

	<div class="modal fade" id="modal-edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="form-edit" method="POST" role="form">
					<div class="modal-header" id="ok">
						<h4 class="modal-title">Update Category</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label for="">Tên thể loại</label>
							<input name="name_cat" type="text" class="form-control" id="name_category" placeholder="Tên thể loại" value="{{ $cate_info->name_cat }}">
						</div>


						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary" onclick="updateCate({{ $cate_info->id }})">Edit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>