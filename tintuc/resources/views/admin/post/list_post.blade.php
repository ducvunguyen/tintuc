@foreach($listPost as $key => $post)
<tr>
	<td>{{++$key}}</td>
	<td>{{$post->title}}</td>
	<td>{{$post->creator->name}}</td>
	<td>{{$post->editor->name}}</td>
	<td><button type="button" class="btn btn-warning">Edit</button></td>
	<td><button type="button" class="btn btn-danger">Delete</button></td>
</tr>
@endforeach