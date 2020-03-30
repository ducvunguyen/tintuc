@extends('admin.layout')

@section('content')
<div class="container">
	<form method="POST" role="form" action="{{route('admin.user.update', $findUser->id)}}">
		<legend>Form title</legend>		
		@csrf
		<div class="form-group">
			<label for="">Name</label>
			<input name="name" value="<?php echo $findUser->name ?>" type="text" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">email</label>
			<input value="{{$findUser->email}}" name="email" type="text" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">password</label>
			<input name="password" type="text" class="form-control" id="" placeholder="Input field">
		</div>	
		<div class="form-group">
			<label for="">re-password</label>
			<input name="re_password" type="password" class="form-control" id="" placeholder="Input field">
		</div>
		<select name="role[]" class="form-group" multiple="multiple">
			<?php foreach ($listRole as $key => $role): ?>
				<option value="{{$role->id}}" {{$role_id->contains($role->id) ? 'selected' : ''}}> <?php echo $role->display_role ?></option>
			<?php endforeach ?>
		</select>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

@endsection