
<thead>
			<tr>
				<th>STT</th>
				<th>Url Image</th>
				<th>Người tạo</th>
				<th>Người sửa</th>
				<th colspan="2">ACtion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($listBanner as $key => $banner )
				<tr>
					<td>{{++$key}}</td>
					<td><img style="width: 150px; height: 100px" src="uploads/banners/{{$banner->name_url}}" alt=""></td>
					<td>{{$banner->created_by}}</td>
					<td>{{$banner->updated_by}}</td>
					<td><button onclick="ModalBannerEdit({{$banner->id}})" type="button" class="btn btn-warning">Edit</button></td>
					<td><button  type="button" onclick="ModalBannerDelete({{$banner->id}})" class="btn btn-danger">Delete</button></td>
				</tr>
			@endforeach
		</tbody>
