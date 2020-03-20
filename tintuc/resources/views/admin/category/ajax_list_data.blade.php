
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
			<td>
				<button onclick="showEditModal({{$category->id}})" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>
			</td>
			<td>
				<a href="javascript:;" data-toggle="modal"  class="btn btn-danger btn-delete" onclick="deleteCategory({{$category->id}})">Delete</a>
			</td>
		</tr>
	@endforeach		
</tbody>
<div>
	@include('admin.category.create')
</div>
