@extends('layouts.app')


@section('content')

<form action="{{action('UserController@store')}}"
						method='POST'>
		{!! csrf_field()!!}
		<div class="form-group">
				<label>Name</label>
				<input class="form-control" 
											name='user_name'
											type='text'
											/>
		</div>

		<div class="form-group">
				<label>Email</label>
				<input class="form-control" 
											name='user_email'
											type='email'
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
											/>
		</div>

		<div class="form-group">
				<input class="form-control btn-primary" 
											type='submit'
											name='btnUserSave'
											id='btnUserSave'
											value='Save'
											/>
		</div>

</form>

@endsection
