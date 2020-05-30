

<div id="modal-add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4>Bình luận bài viết bởi: <span>{{Auth::user()->name}}</span></h4>
        <form id="formStore" method="POST" role="form">

          <div class="form-group">
            <label for="">Chọn tên bài viết</label>
            <select class="form-control" name="post_id">
                @foreach($list_post as $item)
                <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="">Nội dung</label>
              <textarea id="content_add" name="content" class="form-control" ></textarea>
          </div>
          
        	<button type="button" class="btn btn-primary" onclick="BaseCrud.store()">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

{{-- <script>
  config = {};
  config.entities_latin = false;
  config.language = 'vi';
  config.uiColor = '#AADC6E';

  // CKEDITOR.instances.content_add.setData(html);

  CKEDITOR.replace( 'content_add',
  {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserBrowseUrl: '/browser/browse.php?type=Images',
    filebrowserUploadUrl: '/uploader/upload.php?type=Files'
  });

  
  function CKEditorAdd(){
    for (instance in CKEDITOR.instances) {
      CKEDITOR.instances[instance].updateElement();
    }
  }
  var img = $('<img />');
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        
        img.attr('src', e.target.result);
        $('#render_img').append(img);

      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#image_add").change(function(){
    readURL(this);
  });
</script>
 --}}
