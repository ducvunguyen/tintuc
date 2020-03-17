@extends('admin.layout')

@section('content')
<div class="container">
	<form method="POST" role="form" action="{{route('admin.role.update', $findRole->id)}}">
		<legend>Form title</legend>		
		@csrf
		<div class="form-group">
			<label for="">Name Role</label>
			<input name="name" value="{{$findRole->name_role}}" type="text" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">Display name</label>
			<input name="display_role" type="text" class="form-control" value="{{$findRole->display_role}}" placeholder="Input field">
		</div>

		<div class="checkbox">
				<?php foreach ($listPermission as $key => $listPermission): ?>
					<input {{$getAllPermissionRole->contains($listPermission->id) ? 'checked' : ''}} value="{{$listPermission->id}}" type="checkbox" class="form-check" name="permission[]"> <?php echo $listPermission->display_permission ?>
					
				<?php endforeach ?>
				
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

@endsection