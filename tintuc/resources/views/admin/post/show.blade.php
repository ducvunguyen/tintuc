<div id="modal-show" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" style="max-width: 70%" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<span>{{$postInfo->category->name_cat}}</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
       		<div>
       			<h3>{{$postInfo->title}}</h3>
       			{{-- <img src="/uploads/posts/{{$postInfo->avatar}}" alt=""> --}}
       			<img style="width: 100%" src="/uploads/posts/{{$postInfo->avatar}}" alt="">
       		</div>
       		<p>{!!$postInfo->content!!}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->