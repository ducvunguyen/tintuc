<script>

	BaseCrud = {
		_urlLoadDataItems: null,
		_urlAdd: null,
		_urlStore: null,
		_urlEdit: null,
		_urlUpdate: null,
		_urlDelete: null,
		_urlDestroy: null,
		_formStore: null,
		_formUpdate: null,
		_formDelete: null,

		init: function(urlLoadDataItem, urlAdd, urlStore, urlEdit, urlUpdate, urlDelete, urlDestroy){
			console.log(urlLoadDataItem);
			BaseCrud._urlLoadDataItems = urlLoadDataItem;
			BaseCrud._urlAdd = urlAdd;
			BaseCrud._urlStore = urlStore;
			BaseCrud._urlEdit = urlEdit;
			BaseCrud._urlUpdate = urlUpdate;
			BaseCrud._urlDelete = urlDelete;
			BaseCrud._urlDestroy = urlDestroy;

			BaseCrud.loadDataItem(); 
		},

		loadDataItem: function(){
			var url = BaseCrud._urlLoadDataItems;
			console.log(url);

			$.ajax({
				type: 'post',
				url: url,
				dataType: 'text',	
				success: function (res){
					$('#data-item').html(res);
				},error: function(jqXHR, textStatus, errorThorw){
					alert('fail');
				}
			});
		},

		initForm :  function(formStore, formUpdate, formDelete){
			if (formStore != null) {
				BaseCrud._formStore = formStore;
			}

			if (formUpdate !=null) {
				BaseCrud._formUpdate = formUpdate;
			}
			if (formUpdate != null) {
				BaseCrud._formDelete = formDelete
			}
		},

		add : function(){
			$.ajax({
				url: BaseCrud._urlAdd,
				type: 'POST',
				data: {},
				success: function(res){
					toastr.success('thanh cong');
					$('#div-modal-box').html(res);
					$('#modal-add').modal('show');
				},
				error: function(jqXHR, textStatus, errorThorw){
					toastr.error('fail');
				}
			});
		},

		store : function(){
			// var value = CKEDITOR.instances['content_add'].getData();
			// let data = $('#'+BaseCrud._formStore).serialize();
			// console.log(value);
			$.ajax({
				url : BaseCrud._urlStore,
				type : 'POST',
				data: $('#'+BaseCrud._formStore).serialize(),
				success : function(res){
					if (res.status == 0) {
						toastr.error(res.message);
					}else{
						toastr.success(res.message);
						$('#modal-add').modal('hide');
						BaseCrud.loadDataItem();
					}		
				},
				error: function(response){
					let message = response.responseJSON.errors;
					$.each(message, function(key, value){
						toastr.error(value);
					})
				}
			});
		},

		edit: function(id){
			console.log(id);
			$.ajax({
				url :  BaseCrud._urlEdit,
				type: 'POST',
				data: {
					id: id
				}, 
				success : function(result){	
					$('#div-modal-box').html(result);
					$('#modal-edit').modal('show');
				}, error: function(response){
					toastr.error('fail');
				}
			});
		},

		update: function(){
			$.ajax({
				url: BaseCrud._urlUpdate,
				type: 'post',
				data: $('#'+BaseCrud._formUpdate).serialize(),
				success : function(result){	
					if (result.status ==0) {
						toastr.error(result.message);
					}else{
						toastr.success(result.message);
						$('#modal-edit').modal('hide');
						BaseCrud.loadDataItem();
					}
				}, error: function(response){
					let message = response.responseJSON.errors;

					$.each(message, function(key, value){
						toastr.error(value);
					});
				}
			});
		},
		delete : function(id){
			$.ajax({
				url : BaseCrud._urlDelete,
				type: 'post',
				data: {
					id: id,
				}, 
				success: function(result){
					$('#div-modal-box').html(result);
					$('#modal-delete').modal('show');
				}, error: function(jqXHR, textStatus, errorThorw){
					toastr.error('Có chuyện gì đó xảy ra');
				}
			});
		},

		destroy : function(id){
			$.ajax({
				type: "post",
				url : BaseCrud._urlDestroy,
				data: {
					id :id,
				},
				success: function(result){
					if (result.status ==0) {
						toastr.error(result.message);
					}else{
						toastr.success(result.message);
						$('#modal-delete').modal('hide');
						BaseCrud.loadDataItem();
					}
				}, error: function(jqXHR, textStatus, errorThorw){
					toastr.error('Có chuyện gì đó xảy ra');
				}
			});
		}

	}


</script>