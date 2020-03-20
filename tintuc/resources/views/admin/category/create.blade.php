

<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="" data-url="{{ route('admin.category.store') }}" id="form-add" method="POST" role="form">
				@csrf
				<div class="modal-header" id="ok">
					<h4 class="modal-title">Category</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="">Tên thể loại</label>
						<input name="name_cat" type="text" class="form-control" id="name_cate" placeholder="Tên thể loại">
					</div>


				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
