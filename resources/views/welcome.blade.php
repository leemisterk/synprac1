@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
				<div class="col-md-10 col-md-offset-1">
						<div class="panel panel-default">
								<div class="panel-heading">Welcome</div>

								@can('role_admin')
								<div class="panel-body">
										Admin
								</div>
								@endcan

								@can('role_staff')
								<div class="panel-body">
										Admin
								</div>
								@endcan

								@can('role_guest')
								<div class="panel-body">
										guest
								</div>
								@endcan
								
								@if(Auth::guest())
									<div class="panel-body">
										guest
								</div>
								@endif
						</div>
				</div>
		</div>
</div>
@endsection
