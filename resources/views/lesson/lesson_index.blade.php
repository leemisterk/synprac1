@extends('layouts.app')


@section('content')

<a class='btn btn-primary'
			href="{{action('LessonController@create')}}"
		>
				New Lesson
</a>
			

@endsection

