@extends('admin.layout')

@section('content')
	<a class="btn-primary btn" data-target="#modal-add" data-toggle="modal">Add</a>
	<p></p>
	<table class="table table-hover" id="cate-table">
		@include('admin.category.ajax_list_data')
	</table>

	<div id="edit-modal-div"></div>
	<div id="delete-modal-div"></div>

	{{-- {{$listCate->links()}} --}}
	
	
@endsection

@section('script')
	@include('admin.category.script')
@endsection