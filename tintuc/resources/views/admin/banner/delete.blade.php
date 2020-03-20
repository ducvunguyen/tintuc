
<style>
	#render_img img {
		width: 100%;
	}
</style>
<div class="modal fade" id="modal-delete">
	<div class="modal-dialog">
		<div class="modal-content">

			<form id="form-delete" method="POST">
				<div class="modal-header" id="ok">
					<h4 class="modal-title">Banner</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
				<div class="form-group">
					<p>Bạn muốn xóa ảnh này chứ?</p>
					<img style="width: 100%" src="uploads/banners/{{$getBannerInfo->name_url}}" alt="">
				</div>
	
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button onclick="deleteBanner({{$getBannerInfo->id}})" type="button" class="btn btn-primary">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>
