@extends('layouts.app')


@section('content')

<form class="form"
						action="{{action('RoleController@store')}}"
		method="POST">
		{!! csrf_field() !!}
		
		<div class="form-group">
				<label>Role Description</label>
				<input class="form-control"
											name='role_description'
											id='role_description'
											/>				
		</div>
		<input type="submit" 
									class="form-control"
									name="btnRoleSave"
									id="btnRoleSave" />
		
</form>



@endsection