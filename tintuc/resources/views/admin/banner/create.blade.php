
<style>
	#render_img img {
		width: 100%;
	}
</style>
<div class="modal fade" id="modal-add">
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
						<input name="image" type="file" class="form-control" id="img_ins" class="imagePd"><p></p>
						<div id="render_img"></div>
					</div>


				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button onclick="insertBanner()" type="button" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
