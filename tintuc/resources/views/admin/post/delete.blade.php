<div class="modal fade" id="modal-del">
	<div class="modal-dialog">
		<div class="modal-content">

			<form id="form-del" method="POST" role="form">
				@csrf
				<div class="modal-header" id="ok">
					<h4 class="modal-title">Post</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Bạn chắc muốn xóa chứ?</p>		
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button onclick="DeletePost({{$postInfo->id}})" type="button" class="btn btn-danger">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>
