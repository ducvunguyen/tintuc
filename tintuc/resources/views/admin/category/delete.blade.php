<div class="modal fade" id="modal-del">
	<div class="modal-dialog">
		<div class="modal-content">

			<form id="form-del" method="POST" role="form">
				<div class="modal-header" id="ok">
					<h5>Bạn có chắc muốn xóa không?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button onclick="deleteCate({{$infoCate->id}})" type="button" class="btn btn-primary">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>