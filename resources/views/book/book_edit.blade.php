@extends('layouts.app')


@section('content')

<form class="form"
						action="{{action('BookController@update',['id'=>$book->id])}}"
						method="POST"
						enctype="multipart/form-data">

		{!! csrf_field()!!}
		{!! method_field('PUT') !!}
		
		<div class="form-group">
				<label> Book Title</label>
				<input class="form-control"
											type="text" 
											name="book_title" 
											id="book_title"
											value='{{$book->book_title}}'
											/>
		</div>
		
			<div class="form-group">
				<label> Category</label>
				<input class="form-control"
											type="text" 
											name="book_category" 
											id="book_category"
											value='{{$book->book_category}}'
											/>
		</div>
		
			<div class="form-group">
				<label> Level</label>
				<input class="form-control"
											type="text" 
											name="book_level" 
											id="book_level" 
											value='{{$book->book_level}}'
											/>
		</div>

		<div class="form-group">
				<label> Book Cover Image</label>
				@if(is_file(public_path().'/' . $book->book_cover_image))
						<img src='{{asset($book->book_cover_image)}}'
											width="70"
											height="70"
											class="img-responsive"
											name='img_book_cover_image'
											id='img_book_cover_image'
											/>
					
						@endif
						<input type="hidden"
													name='old_book_cover_image'
													value='{{$book->book_cover_image}}'/>
						
				<input class="form-control"
											type="file" 
											name="new_book_cover_image" 
											id="new_book_cover_image"											
											/>

				<input class="form-control btn btn-primary"
											type="submit" name="btnBookSave" id="btnBookUpdate"
											value="Update" />
		</div>

</form>



@endsection
