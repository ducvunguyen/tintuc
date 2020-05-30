 <?php foreach ($list_comment as $key => $item): ?>
			<tr>
				<td><?php echo ++$key ?></td>]
				<td>{{$item->user->name}}</td>
				<td><?php echo $item->content ?></td>
				<td><?php echo $item->display_role ?></td>
				<td>
					<button onclick="BaseCrud.edit({{$item->id}})" class="btn btn-warning">Edit</button>
					<button onclick="BaseCrud.delete({{$item->id}})" class="btn btn-danger">Delete</button>
				</td>
			</tr>
<?php endforeach ?> 