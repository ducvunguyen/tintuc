@extends('admin.layout')

@section('content')
	
	<a href="#" class="btn btn-primary" data-target="#modal-add" data-toggle="modal">Add</a>
	<table class="table table-hover">
		<p></p>
		<thead>
			<tr>
				<th>STT</th>
				<th>Title</th>
				<th>Người tạo</th>
				<th>Người sửa</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@include('admin.post.list_post')
		</tbody>
	</table>
	@include('admin.post.create')
@endsection

@section('script')
	@include('admin.post.script')
	
@endsection