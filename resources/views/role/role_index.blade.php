@extends('layouts.app')


@section('content')
<a class="btn btn-primary"
			href="{{action('RoleController@create')}}"
		>
				New Role
</a>

@if(count($roles)>0)

<table class="table table-bordered table-hover">

		<thead >
		<th class="text-center">ID</th>
		<th class="text-center">Description</th>		
		@can('role_admin')
		<th></th>
		@endcan

</thead>
<tbody class="text-center">
		@foreach($roles as $role)
		<tr>
				<td>{{$role->id}}</td>
				<td>{{$role->role_description}}</td>
			
				@can('role_admin')
				<td>
						<form class="form"
												action="{{action('RoleController@destroy',['id'=>$role->id])}}"
												method="POST"
												>
								{!! csrf_field()!!}
								{!! method_field('DELETE')!!}
								<a class="btn btn-primary"
											href="{{action('RoleController@edit',['id'=>$role->id])}}"
											>
										Edit
								</a>
								@can('role_admin')
								<input class="btn btn-danger"
												type="submit"
															value="Delete"
															name="btnRoleDelete"
															id="btnRoleDelete"
															/>
								@endcan

						</form>

				</td>
				@endcan
		</tr>

		@endforeach
</tbody>
</table>

@endif


@endsection