@extends('admin.layout')

@section('content')
<button class="btn btn-primary" onclick="BaseCrud.add()">Add</button>
<table class="table table-hover">
	<thead>
		<tr>
			<th>STT</th>
			<th>ho va ten</th>
			<th>comment</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="data-item">
		
	</tbody>
</table>

<div id="div-modal-box"></div>
@endsection

@section('script')
	@include('basejs.crud')
	<script>
		$(document).ready(function(){
			BaseCrud.init('{{route('admin.comment.load-data')}}', '{{route('admin.comment.add')}}', '{{route('admin.comment.store')}}', '{{route('admin.comment.edit')}}', '{{route('admin.comment.update')}}', '{{route('admin.comment.delete')}}', '{{route('admin.comment.destroy')}}');
			BaseCrud.initForm('formStore', 'formUpdate')
		})
	</script>
@endsection