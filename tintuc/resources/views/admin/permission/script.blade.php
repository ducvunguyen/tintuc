<script>
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
    });

	
	
	function modalAdd(){
		
		// console.log(1);
		var url = '{{route("admin.permission.create")}}';
		console.log(url);


		$.ajax({
			type : 'get',
			url: url,
			success : function(response){
				if (response.status === 0) {
					toastr.error(response.message);
				}else{
					$('#modal-add-div').html(response.show_modal);
					$('#modal-add').modal('show');
				}
			},error : function(jqXHR, errorThrow, textStatus){
				toastr.error('Có lỗi xảy ra');
			}
		});
	}

	function AddPost(){
      var url = "{{route('admin.permission.store')}}";
      // console.log(url);
      var role = new Array();

	  $("input:checked").each(function() {
          role.push($(this).val());
        });

      $.ajax({
        url: url,
        type: 'post',
        data: {
          name_permission: $('#name_add').val(),
          display_permission: $('#display_add').val(),
          role: role,
        }, success: function(response){
        	if (response.status ===0) {
        		toastr.error(response.message);
        	}else{
        		toastr.success(response.message);
        		$('#reload').html(response.render_view);
        		$('#modal-add').modal('hide');
        	}
        },error : function(jqXHR, textStatus, errorThrow){
        	toastr.error('Có chuyện gì đó xảy ra?');
        }
      });
    }

</script>