<?php

			/*
				 |--------------------------------------------------------------------------
				 | Routes File
				 |--------------------------------------------------------------------------
				 |
				 | Here is where you will register all of the routes in an application.
				 | It's a breeze. Simply tell Laravel the URIs it should respond to
				 | and give it the controller to call when that URI is requested.
				 |
				*/



			/*
				 |--------------------------------------------------------------------------
				 | Application Routes
				 |--------------------------------------------------------------------------
				 |
				 | This route group applies the "web" middleware group to every route
				 | it contains. The "web" middleware group is defined in your HTTP
				 | kernel and includes session state, CSRF protection, and more.
				 |
				*/

//			use	Gate;
			Route::get('/',	function(){
			
				return view('home');
			});
			
		

		
			Route::get('b/books',	'BController@books');
			Route::resource('admin/book','BookController');


			Route::group(['middleware'	=>	'web'],	function	()
				{
				Route::auth();

				Route::group(['prefix'	=>	'admin'],	function()
					{
					Route::resource('book',	'BookController');
					Route::resource('user',	'UserController');
					Route::resource('role',	'RoleController');
					Route::resource('lesson',	'LessonController');
					});

				Route::get('/home',	'HomeController@index');
				
				});
			