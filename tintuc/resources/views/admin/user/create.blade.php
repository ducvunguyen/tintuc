@extends('admin.layout')

@section('content')
<div class="container">
	<form method="POST" role="form" action="{{route('admin.user.store')}}">
		

<!-- Create Post Form -->
		<legend>Tạo tài khoản</legend>		
		@csrf
		<div class="form-group">
			@if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->get('name') as $name)
                    <span>{{ $name }}</span>
                    @endforeach
            </div>
            @endif
			<label for="">Name</label>
			<input name="name" type="text" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			@if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->get('email') as $email)
                    <span>{{ $email }}</span>
                    @endforeach
            </div>
            @endif
			<label for="">email</label>
			<input name="email" type="text" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			@if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->get('password') as $password)
                    <span>{{ $password }}</span>
                    @endforeach
            </div>
            @endif
			<label for="">password</label>
			<input name="password" type="text" class="form-control" id="" placeholder="Input field">
		</div>	
		<div class="form-group">
			<label for="">re-password</label>
			<input name="re_password" type="password" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			@if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->get('role') as $role)
                    <span>{{ $role }}</span>
                    @endforeach
            </div>
            @endif
			<select name="role[]" class="form-group" multiple="multiple">
				<?php foreach ($listRole as $key => $val): ?>
					<option value="{{$val->id}}"> <?php echo $val->display_role ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

@endsection