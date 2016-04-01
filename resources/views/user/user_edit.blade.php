@extends('layouts.app')


@section('content')

<form action="{{action('UserController@update',['id'=>$user->id])}}"
						method='POST'>
		{!! csrf_field()!!}
			{!! method_field('PUT')!!}
		
		<div class="form-group">
				<label>Name</label>
				<input class="form-control" 
											name='user_name'
											type='text'
											value='{{$user->name}}'
											/>
		</div>

		<div class="form-group">
				<label>Email</label>
				<input class="form-control" 
											name='user_email'
											type='email'
												value='{{$user->email}}'
											/>
		</div>

		<div class="form-group">
				<label>Password</label>
				<input class="form-control" 
											name='user_password'
											type='password'
												
											/>
		</div>

		<div class="form-group">
				<label>Role</label>
				<input class="form-control" 
											name='user_role'
											type='text'
												value='{{$user->role}}'
											/>
		</div>

		<div class="form-group">
				<input class="form-control btn-primary" 
											type='submit'
											name='btnUserSave'
											id='btnUserUpdate'
											value='Update'
											/>
		</div>

</form>

@endsection
