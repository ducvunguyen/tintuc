

<div id="modal-delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4>Xóa bình luận bài viết bởi: <span>{{Auth::user()->name}}</span></h4>
        <span>Bạn chắc muốn xóa chứ</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="BaseCrud.destroy({{$find_comment->id}})">Xóa</button>
      </div>
    </div>

  </div>
</div>

