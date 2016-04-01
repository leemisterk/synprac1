<?php

			namespace	App\Http\Controllers;

			use	Illuminate\Http\Request;
			use	App\Http\Requests;
			use	Storage;
			use	File;
			use	Auth;
			use	Gate;

			class	BookController	extends	Controller
			{

				public	function	__construct()
				{
					$this->middleware('auth');
				}

				/**
					* Display a listing of the resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	index()
				{
					if	(Gate::denies('role_guest'))
					{
						$books	=	\App\Book::all();
						return	view('book.book_index',	['books'	=>	$books]);						
					}
					else
					{
						return	back();
					}
				}
				
				
				/**
					* Show the form for creating a new resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	create()
				{
					if	(Gate::denies('role_guest'))
					{
						return	view('book.book_create');
					}
					else
					{
						return	back();
					}
				}

				/**
					* Store a newly created resource in storage.
					*
					* @param  \Illuminate\Http\Request  $request
					* @return \Illuminate\Http\Response
					*/
				public	function	store(Request	$request)
				{
					if	(Gate::denies('role_guest'))
					{
						$book_title							=	"";
						$book_category				=	"";
						$book_level							=	"";
						$book_cover_image	=	'';

						$book										=	new	\App\Book();
						$book_title				=	htmlspecialchars($request->input('book_title'));
						$book_category	=	htmlspecialchars($request->input('book_category'));
						$book_level				=	htmlspecialchars($request->input('book_level'));

						if	($request->hasFile('book_image'))
						{
							$file													=	$request->file('book_image');
							$file_name								=	$file->getClientOriginalName();
							$file->move('image/book/',	$file_name);
							$file_path								=	'image/book/'	.	$file_name;
							$book_cover_image	=	$file_path;
						}
						$book->book_title							=	$book_title;
						$book->book_category				=	$book_category;
						$book->book_level							=	$book_level;
						$book->book_cover_image	=	$book_cover_image;
						$book->save();

						return	redirect()->action('BookController@index');
					}
					else
					{
						return	back();
					}
				}

				/**
					* Display the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	show($id)
				{
					if	(Gate::denies('role_guest'))
					{
						return	view('book.book_show');
					}
					else
					{
						return	back();
					}
				}

				/**
					* Show the form for editing the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	edit($id)
				{

					if	(Gate::denies('role_guest'))
					{
						$book	=	\App\Book::where('id',	'=',	$id)->first();

						return	view('book.book_edit',	['book'	=>	$book]);
					}
					else
					{
						return	back();
					}
				}

				/**
					* Update the specified resource in storage.
					*
					* @param  \Illuminate\Http\Request  $request
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	update(Request	$request,	$id)
				{
						if	(Gate::denies('role_guest'))
					{
						$book_title							=	"";
						$book_category				=	"";
						$book_level							=	"";
						$book_cover_image	=	'';

						$book										=	\App\Book::where('id','=',2)->first();
						$book_title				=	htmlspecialchars($request->input('book_title'));
						$book_category	=	htmlspecialchars($request->input('book_category'));
						$book_level				=	htmlspecialchars($request->input('book_level'));

						$book_cover_image= $book->book_cover_image;
						
						if	($request->hasFile('new_book_cover_image'))
						{
							$file													=	$request->file('new_book_cover_image');
							$file_name								=	$file->getClientOriginalName();
							$file->move('image/book/',	$file_name);
							$file_path								=	'image/book/'	.	$file_name;
							$book_cover_image	=	$file_path;
						}
						$book->book_title							=	$book_title;
						$book->book_category				=	$book_category;
						$book->book_level							=	$book_level;
						$book->book_cover_image	=	$book_cover_image;
						$book->save();

						return	redirect()->action('BookController@index');
					}
					else
					{
						return	back();
					}
				}

				/**
					* Remove the specified resource from storage.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	destroy($id)
				{
					if	(Gate::denies('role_guest'))
					{			
					
						\App\Book::where('id','=',$id)->delete();
						return	redirect()->action('BookController@index');
					}
					else
					{
						return	back();
					}
				}


			}
			