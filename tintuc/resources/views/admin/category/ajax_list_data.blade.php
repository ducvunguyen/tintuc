
<thead>
	<tr>
		<th>STT</th>
		<th>Tên thể loại</th>
		<th>ID người tạo</th>
		<th>ID người sửa</th>
		<th colspan="2">Action</th>
	</tr>
</thead>
<tbody>
	@foreach ($listCate as $key => $category)
		<tr>
			<td><?php echo ++$key ?></td>
			<td><?php echo $category->name_cat ?></td>
			<td><?php echo $category->created_by ?></td>
			<td><?php echo $category->updated_by ?></td>
			<td><button data-url="{{route('admin.category.edit', $category->id)}}" data-target="#modal-edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button></td>
			<td><a href="javascript:;"  class="btn btn-danger btn-delete" onclick="deleteCate({{ $category->id}})">Delete</a></td>
		</tr>
	@endforeach		
</tbody>
<div>
	@include('admin.category.create')
</div>
<div>
	@include('admin.category.update')
</div>
