<?php foreach ($listPermisions as $key => $permission): ?>
	<tr>
		<td><?php echo ++$key ?></td>
		<td><?php echo $permission->name_permission ?></td>
		<td><?php echo $permission->display_permission ?></td>
		<td><a href="{{route('admin.permission.edit', $permission->id)}}" class="btn btn-warning">Edit</a></td>
		<td><a href="{{route('admin.permission.delete', $permission->id)}}" class="btn btn-danger">Delete</a></td>
	</tr>
<?php endforeach ?>