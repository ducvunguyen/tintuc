@extends('admin.layout')

@section('content')
<a href="{{route('admin.user.create')}}" class="btn btn-primary">Add User</a>
<p></p>
<table class="table table-hover">
	<thead>
		<tr>
			<th>STT</th>
			<th>Name</th>
			<th>email</th>
			<th colspan="2">action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($listUser as $key => $value): ?>
			<tr>
				<td><?php echo ++$key ?></td>
				<td><?php echo $value->name ?></td>
				<td><?php echo $value->email ?></td>
				<td><a href="{{route('admin.user.edit', $value->id)}}" class="btn btn-warning">Edit</a></td>
				<td><a href="{{route('admin.user.delete', $value->id)}}" class="btn btn-danger">Delete</a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

@endsection