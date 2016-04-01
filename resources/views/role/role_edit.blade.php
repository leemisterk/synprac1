@extends('layouts.app')


@section('content')

<form class="form"
						action="{{action('RoleController@update',['id'=>$role->id])}}"
		method="POST">
		{!! csrf_field() !!}
		{!! method_field('PUT')!!}
		
		<div class="form-group">
				<label>Role Description</label>
				<input class="form-control"
											name='role_description'
											id='role_description'
											value='{{$role->role_description}}'
											
											/>				
		</div>
		<input type="submit" 
									class="form-control btn-primary"
									name="btnRoleUpdate"
									id="btnRoleSave"	
									value='Update'
									/>
		
</form>


@endsection