@extends('layouts.app')

@section('content')
<a href="{{route('admin.user.create')}}" class="btn btn-primary">Add User</a>
<a href="{{route('admin.role.index')}}" class="btn btn-primary">List Role</a>
<table class="table table-hover">
	{{Auth::user()->name}}
	<thead>
		<tr>
			<th>STT</th>
			<th>Name</th>
			<th>email</th>
			<th>action</th>
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