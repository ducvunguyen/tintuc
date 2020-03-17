@extends('admin.layout')

@section('content')
	<a href="{{route('admin.category.create')}}" class="btn-primary btn" data-target="#modal-add" data-toggle="modal">Add</a>
	<p></p>
	<table class="table table-hover" id="cate-table">
		@include('admin.category.ajax_list_data')
	</table>

	{{-- {{$listCate->links()}} --}}
	
	
@endsection

@section('script')
	<script>
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
      	});


		// $(document).ready(function(){

		// });

		$(document).ready(function(){
			$('#form-add').submit(function(e){
				e.preventDefault();

				var url = $(this).attr('data-url');

				$.ajax({
					type: 'post',
					url : url,
					data : {
						name_cat: $('#name_cat').val(),
					},
					success:function(response){
						if (response.status === 0) {
							toastr.error(response.message);
						}else{
							toastr.success(response.message);
							$('#cate-table').html(response.table_html);//reload lai trang
							$('#modal-add').modal('hide');
						}
					},
					error: function(jqXHR, textStatus, errorThrow){
						toastr.error('Có lỗi xảy ra');
					}
				});
			});
		});

      	function deleteCate(id) {
      		var url = '{{ route("admin.category.delete", ":id") }}';
      		url = url.replace(":id", id);
      		$.ajax({
      				type: 'post',
      				url: url,
      				success: function(response){
							if (response.status == 0) {
								toastr.error(response.message);
							}
							else {
								toastr.success(response.message);
								$('#cate-table').html(response.table_html);
							}
						},
					error: function(jqXHR, textStatus, errorThrow){
						toastr.error('Có lỗi xảy ra');
					}
      			});
      	}

      	$('.btn-edit').click(function(){
      		var url = $(this).attr('data-url');
      		e.preventDefault();

      		$.ajax({
      			type: 'get',
      			url: url,

      			success: function(response){
      				$('#name_cat').val(response.data.name_cat);
      			}
      			error: function(jqXHR, textStatus, errorThrow){

      			}
      		});
      	});
	</script>
@endsection