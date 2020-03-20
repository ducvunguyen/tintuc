@extends('admin.layout')

@section('content')
	
	<a href="#" class="btn-primary btn" data-target="#modal-add" data-toggle="modal">Add</a>
	<p></p>
	<table class="table table-hover" id="banner_html">
		@include('admin.banner.listbanner')
	</table>
	
	<div id="delete-modal"></div>
	<div id="edit-modal"></div>
	@include('admin.banner.create')
@endsection

@section('script')
	@include('admin.banner.ajaxbanner')
	<script>

		function readUrl(input) {
		  if (input.files && input.files[0]) {
		    var reader = new FileReader();
		    
		    reader.onload = function(e) {
		      $('#image').attr('src', e.target.result);
		    }
		    
		    reader.readAsDataURL(input.files[0]);
		  }
		}

		$("#image_banner").change(function() {
		  readUrl(this);
		});
	</script>
@endsection


