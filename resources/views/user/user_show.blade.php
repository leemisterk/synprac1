@extends('layouts.app')


@section('content')


<div class="form-group">
		<label>Name</label>
		<input class="form-control" 
									name='user_name'
									type='text'
									value="{{$user->name}}"
									/>
</div>

<div class="form-group">
		<label>Email</label>
		<input class="form-control" 
									name='user_email'
									type='email'
									value="{{$user->email}}"
									/>
</div>
<div class="form-group">
		<label>Role</label>
		<input class="form-control" 
									name='user_role'
									type='text'
									value="{{$user->role}}"
									/>
</div>




@endsection
