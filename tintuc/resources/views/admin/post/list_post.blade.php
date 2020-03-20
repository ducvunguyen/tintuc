@foreach($listPost as $key => $post)
<tr>
	<td>{{++$key}}</td>
	<td>{{$post->title}}</td>
	<td>{{$post->creator->name}}</td>
	<td>{{$post->editor->name}}</td>
	<td><button type="button" class="btn btn-default" onclick="modalView({{$post->id}})">View</button></td>
	<td><button type="button" class="btn btn-warning" onclick="modalEdit({{$post->id}})">Edit</button></td>
	<td><button type="button" class="btn btn-danger" onclick="modalDelete({{$post->id}})">Delete</button></td>
</tr>
@endforeach