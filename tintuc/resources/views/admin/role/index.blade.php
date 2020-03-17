@extends('admin.layout')

@section('content')
<a href="{{route('admin.role.create')}}" class="btn btn-primary">Add User</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>STT</th>
			<th>Name</th>
			<th>Display Name</th>
			<th colspan="2">action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($roleList as $key => $roleList): ?>
			<tr>
				<td><?php echo ++$key ?></td>
				<td><?php echo $roleList->name_role ?></td>
				<td><?php echo $roleList->display_role ?></td>
				<td><a href="{{route('admin.role.edit', $roleList->id)}}" class="btn btn-warning">Edit</a></td>
				<td><a href="{{route('admin.role.delete', $roleList->id)}}" class="btn btn-danger">Delete</a></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

@endsection