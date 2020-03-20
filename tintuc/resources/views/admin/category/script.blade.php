<script>
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
      	});

            function deleteCategory(id){
                  var url = '{{route('admin.category.delete-modal', ":id")}}';
                  url = url.replace(":id", id);

                  $.ajax({
                        type: 'get',
                        url: url,

                        success: function(response){
                             if (response.status == 0) {
                                    toastr.error(response.message);
                              }
                              else {
                                    $('#delete-modal-div').html(response.html_modal);
                                    $('#modal-del').modal('show');
                              }
                        },error: function(jqXHR, errorThrow, textStatus){
                              toastr.error('Co chuyen gi do xay ra?');
                        }
                  });
            }


		$(document).ready(function(){
			$('#form-add').submit(function(e){
				e.preventDefault();

				var url = $(this).attr('data-url');
				// alert(url);
				$.ajax({
					type: 'post',
					url : url,
					data : {
						name_cat: $('#name_cate').val(),
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
						toastr.error('Chưa thêm thể loại được');
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
                                                $('#modal-del').modal('hide');
								$('#cate-table').html(response.table_html);
							}
						},
					error: function(jqXHR, textStatus, errorThrow){
						toastr.error('Có lỗi xảy ra');
					}
      			});
      	}

      	function showEditModal(id){
      		var data_url = '{{route("admin.category.edit-modal", ":id")}}';
      		data_url = data_url.replace(":id", id);
      		console.log(data_url);
      		// console.log(url);
      		// e.preventDefault();

      		$.ajax({
      			type: 'get',
      			url: data_url,
      			success: function(response){
      				if (response.status == 0) {
      					toastr.error(response.message);
      				}
      				else {
      					$('#edit-modal-div').html(response.html_modal);
                     $('#modal-edit').modal('show');
      				}
      			},
      			error: function(jqXHR, textStatus, errorThrow){
      				toastr.error('Có lỗi xảy ra');
      			}
      		});
      	}

      	function updateCate(id) {
                  var data_url = '{{route("admin.category.update", ":id")}}';
                  data_url = data_url.replace(":id", id);
                  console.log(data_url);
      		$.ajax({
                        type : 'post',
                        url: data_url,
                        data: {
                              name_cat: $('#name_category').val(),
                        },
                        success : function(response){
                              if (response.status === 0) {
                                    toastr.error(response.message);
                              }
                              else{
                                    toastr.success(response.message);
                                    $('#modal-edit').modal('hide');
                                    $('#cate-table').html(response.table_html);
                              }
                        },
                        error : function(jqXHR, textStatus, errorThrow){
                              toastr.error('Cập nhật thất bại');
                        }
                  });
      	}
	</script>