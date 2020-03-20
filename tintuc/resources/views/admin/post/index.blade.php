@extends('admin.layout')

@section('content')
	<div id="modal-edit-div">
		
	</div>
	<div id="modal-show-div">
		
	</div>
	<a href="javascript:;" class="btn btn-primary" onclick="modalAdd()">Add</a>
	<table class="table table-hover">
		<p></p>
		<thead>
			<tr>
				<th>STT</th>
				<th>Title</th>
				<th>Người tạo</th>
				<th>Người sửa</th>
				<th colspan="3">Action</th>
			</tr>
		</thead>
		<tbody id="reload">
			@include('admin.post.list_post')
		</tbody>
	</table>
	<div id="modal-add-div">
		{{-- @include('admin.post.create') --}}
	</div>
	<div id="modal-del-div">
		
	</div>
@endsection

@section('script')
	@include('admin.post.script')
@endsection