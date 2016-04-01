<?php

			namespace	App\Http\Controllers;

			use	Illuminate\Http\Request;
			use	App\Http\Requests;
			use	Gate;
			use	Hash;

			class	UserController	extends	Controller
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
					if	(Gate::allows('role_admin')	|	Gate::allows('role_staff'))
					{
						$users	=	\App\User::all();

						return	view('user.user_index',	['users'	=>	$users]);
					}
				}

				/**
					* Show the form for creating a new resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	create()
				{
					if	(Gate::allows('role_admin')	|	Gate::allows('role_staff'))
					{
						return	view('user.user_create');
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
					if	(Gate::allows('role_admin')	|	Gate::allows('role_staff'))
					{
				

					$user										=	new	\App\User();
					$user_name					=	"";
					$user_email				=	"";
					$user_password	=	"";
					$user_role					=	"";

					$user_name					=	$request->input('user_name');
					$user_email				=	$request->input('user_email');
					$user_password	=	Hash::make($request->input('user_password'));
					$user_role					=	$request->input('user_role');

					$user->name					=	$user_name;
					$user->email				=	$user_email;
					$user->password	=	$user_password;
					$user->role					=	$user_role;

					$user->save();
					return	redirect()->action('UserController@show',	['id'	=>	$user->id]);
			
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
					if	(Gate::allows('role_admin')	|	Gate::allows('role_staff'))
					{
				

					$user	=	\App\User::where('id',	'=',	$id)->first();
					return	view('user.user_show',	['user'	=>	$user]);
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
					if	(Gate::allows('role_admin')	|	Gate::allows('role_staff'))
					{
						
						$user	=	\App\User::where('id',	'=',	$id)->first();

						return	view('user.user_edit',	['user'	=>	$user]);
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
					if	(Gate::allows('role_admin')	|	Gate::allows('role_staff'))
					{
					
						$user										=	\App\User::find($id);
						$user_name					=	"";
						$user_email				=	"";
						$user_password	=	"";
						$user_role					=	"";

						$user_name					=	$request->input('user_name');
						$user_email				=	$request->input('user_email');
						$user_password	=	Hash::make($request->input('user_password'));
						$user_role					=	$request->input('user_role');

						$user->name					=	$user_name;
						$user->email				=	$user_email;
						$user->password	=	$user_password;
						$user->role					=	$user_role;

						$user->save();

						return	redirect()->action('UserController@show',	['id'	=>	$user->id]);
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
					if	(Gate::allows('role_admin')	|	Gate::allows('role_staff'))
					{
						\App\User::destroy($id);
						return	view('user.user_index');
					}
					else
					{
						return	back();
					}
					//
				}

			}
			