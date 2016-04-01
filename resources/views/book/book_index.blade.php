@extends('layouts.app')


@section('content')
<a class="btn btn-primary"
			href="{{action('BookController@create')}}"
			>
		New Book
</a>


@if(count($books)>0)

<table class="table table-bordered table-hover">

		<thead >
		<th class="text-center">ID</th>
		<th class="text-center">Image</th>
		<th class="text-center">Title</th>
		<th class="text-center">Category</th>
		<th class="text-center">Level</th>
		@can('role_admin')
		<th></th>
		@endcan

		@can('role_staff')
		<th></th>
		@endcan

</thead>
<tbody class="text-center">
		@foreach($books as $book)
		<tr>
				<td>{{$book->id}}</td>
				<td>


						@if(is_file(public_path().'/' . $book->book_cover_image))
						<img src='{{asset($book->book_cover_image)}}'
											width="70"
											height="70"
											/>
					
						@endif

				</td>
				<td>{{$book->book_title}}</td>
				<td>{{$book->book_category}}</td>
				<td>{{$book->book_levle}}</td>
				@can('role_guest')				
				@else
				<td>						
						<form class="form"
												action="{{action('BookController@destroy',['id'=>$book->id])}}"
												method="POST"
												>
								{!! csrf_field()!!}								
								{!! method_field('DELETE')!!}

								<a class="btn btn-primary"
											href="{{action('BookController@edit',['id'=>$book->id])}}"
											>
										Edit
								</a>

								<input class="btn btn-danger"
															type="submit"
															value="Delete"
															name="btnBookDelete"
															id="btnBookDelete"
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
