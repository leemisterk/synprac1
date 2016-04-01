@extends('layouts.app')


@section('content')

@can('create_user')

<a class="btn btn-primary"
			href="{{action('UserController@create')}}"
			>
		New User
</a>
@endcan

@if(count($users)>0)

<table class="table table-bordered table-hover">

		<thead >
		<th class="text-center">ID</th>
		<th class="text-center">Name</th>
		<th class="text-center">Email</th>
		<th class="text-center">Role</th>
		@can('role_admin')
		<th></th>
		@endcan

		@can('role_staff')
		<th></th>
		@endcan

</thead>
<tbody class="text-center">
		@foreach($users as $user)
		<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->role}}</td>
				@can('role_guest')
				
				@else
				<td>						
						<form class="form"
												action="{{action('UserController@destroy',['id'=>$user->id])}}"
												method="POST"
												>
								{!! csrf_field()!!}
								{!! method_field('DELETE')!!}
								<a class="btn btn-primary"
											href="{{action('UserController@edit',['id'=>$user->id])}}"
											>
										Edit
								</a>
							
								<input class="btn btn-danger"
															type="submit"
															value="Delete"
															name="btnUserDelete"
															id="btnUserDelete"
															/>						

						</form>

				</td>
				@endcan
		</tr>

		@endforeach
</tbody>
</table>
@endif

@endsection

