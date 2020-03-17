{{-- @extends('admin.layout')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<form action="{{route('admin.category.update', $findCateId->id)}}" method="POST" role="form">
				<legend>Add category</legend>
				@csrf
				<div class="form-group">
					<label for="">Tên thể loại</label>
					<input name="name_cat" type="text" class="form-control" value="{{$findCateId->name_cat}}" placeholder="Tên thể loại">
				</div>
			
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@endsection --}}


<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="" data-url="{{ route('admin.category.store') }}" id="form-edit" method="POST" role="form">
				@csrf
				<div class="modal-header" id="ok">
					<h4 class="modal-title">Update Category</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="">Tên thể loại</label>
						<input name="name_cat" type="text" class="form-control" id="name_cat" placeholder="Tên thể loại">
					</div>


				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>