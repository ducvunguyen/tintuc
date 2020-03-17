@extends('admin.layout')

@section('content')
<div class="container">
	<form method="POST" role="form" action="{{route('admin.role.store')}}">
		<legend>Form title</legend>		
		@csrf
		<div class="form-group">
			<label for="">Name Role</label>
			<input name="name" type="text" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">Display name</label>
			<input name="display_role" type="text" class="form-control" id="" placeholder="Input field">
		</div>

		<div class="form-group">
				<?php foreach ($listPermission as $key => $listPermission): ?>
					<label for="" class="form-check-label"><?php echo $listPermission->display_permission ?></label>
					<input value="{{$listPermission->id}}" type="checkbox" class="form-check" name="permission[]">
					
				<?php endforeach ?>
				
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

@endsection