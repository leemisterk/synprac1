@extends('layouts.app')


@section('content')

<form class="form"
						action="{{action('BookController@store')}}"
						method="POST"
						enctype="multipart/form-data">

		{!! csrf_field()!!}
		
		<div class="form-group">
				<label> Book Title</label>
				<input class="form-control"
											type="text" name="book_title" id="book_title" />
		</div>
		
			<div class="form-group">
				<label> Category</label>
				<input class="form-control"
											type="text" name="book_category" id="book_category" />
		</div>
		
			<div class="form-group">
				<label> Level</label>
				<input class="form-control"
											type="text" name="book_level" id="book_level" />
		</div>

		<div class="form-group">
				<label> Book Cover Image</label>
				<input class="form-control"
											type="file" name="book_image" id="book_image" />

				<input class="form-control btn btn-primary"
											type="submit" name="btnBookSave" id="btnBookSave"
											value="Save" />
		</div>

</form>


@endsection
