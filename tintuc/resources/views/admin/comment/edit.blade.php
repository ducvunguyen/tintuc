

<div id="modal-edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4>Sửa bình luận bài viết bởi: <span>{{Auth::user()->name}}</span></h4>
        <form id="formUpdate" method="POST" role="form">
          <input type="hidden" name="id" value="{{$find_comment->id}}">
          <div class="form-group">
            <label for="">Chọn tên bài viết</label>
            <select class="form-control" name="post_id">
                
                <option value="{{@$find_comment->post->id}}">{{@$find_comment->post->title}}</option>
               
            </select>
          </div>
          <div class="form-group">
              <label for="">Nội dung</label>
              <textarea id="content_add" name="content" class="form-control" >{{$find_comment->content}}</textarea>
          </div>
          
        	<button type="button" class="btn btn-primary" onclick="BaseCrud.update({{$find_comment->id}})">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

