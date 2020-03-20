
<style>
	#render_img img {
		width: 100%;
	}
</style>
<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<form enctype="multipart/form-data"  id="form-add" method="POST">
				<div class="modal-header" id="ok">
					<h4 class="modal-title">Add Banner</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group" id="add-form">
						<label for="">URL image</label>
						<input name="image_banner" type="file" class="form-control " id="image_banner" class="imagePd"><p></p>
						<div>
							<img style="width: 100%" id="image" src="uploads/banners/{{$getBannerInfo->name_url}}">
						</div>
					</div>


				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button onclick="editBanner({{$getBannerInfo->id}})" type="button" class="btn btn-primary">Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>
