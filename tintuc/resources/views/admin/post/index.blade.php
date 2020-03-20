@extends('admin.layout')

@section('content')
	<div id="">
		
	</div>
	<a href="#" class="btn btn-primary" data-target="#modal-add" data-toggle="modal" onclick="modalAdd()">Add</a>
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
		<tbody id="reload">
			@include('admin.post.list_post')
		</tbody>
	</table>
	<div id="modal-add-div">
		{{-- @include('admin.post.create') --}}
	</div>
@endsection

@section('script')
	@include('admin.post.script')
@endsection