@foreach($listPost as $key => $post)
<tr>
	<td>{{++$key}}</td>
	<td>{{$post->title}}</td>
	<td>{{$post->created_by}}</td>
	<td>{{$post->updated_by}}</td>
	<td><button type="button" class="btn btn-warning">Edit</button></td>
	<td><button type="button" class="btn btn-danger">Delete</button></td>
</tr>
@endforeach