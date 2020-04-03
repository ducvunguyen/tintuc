

<div id="modal-add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4>Add Permission</h4>
        <form  method="POST" role="form">
        
        	<div class="form-group">
        		<label for="">Tên phân quyền</label>
        		<input name="name_permission" type="text" class="form-control" id="name_add" placeholder="Input field">
        	</div>
          <div class="form-group">
            <label for="">Tên hiển thị</label>
            <input name="display_permission" type="text" class="form-control" id="display_add" placeholder="Input field">
          </div>
          
          <div class="checkbox" id="check">
            @foreach($listRoles as $key => $role)
            <label>
              <input type="checkbox" value="{{$role->id}}" name="role[]" id="role_add{{$role->id}}"> {{$role->name_role}}
            </label><p></p>
            @endforeach    
          </div>
        
        	<button type="button" class="btn btn-primary" onclick="AddPost()">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

