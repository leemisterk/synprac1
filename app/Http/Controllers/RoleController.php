<?php

			namespace	App\Http\Controllers;

			use	Illuminate\Http\Request;
			use	App\Http\Controllers\Controller;
			use	App\Http\Requests;
			use	Gate;

			class	RoleController	extends	Controller
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
					if	(Gate::denies('role_admin'))
					{
						return	back();
					}
					$roles	=	\App\Role::all();

					return	view('role.role_index',	['roles'	=>	$roles]);
				}

				/**
					* Show the form for creating a new resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	create()
				{
					if	(Gate::denies('role_admin'))
					{
						return	back();
					}
					return	view('role.role_create');
				}

				/**
					* Store a newly created resource in storage.
					*
					* @param  \Illuminate\Http\Request  $request
					* @return \Illuminate\Http\Response
					*/
				public	function	store(Request	$request)
				{
					$role																			=	new	\App\Role();
					$role->role_description	=	htmlspecialchars($request->input('role_description'));
					$role->save();
					return	redirect()->action('RoleController@index');
				}

				/**
					* Display the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	show($id)
				{
					if	(Gate::denies('role_admin'))
					{
						return	back();
					}
					return	view('role.role_show');
				}

				/**
					* Show the form for editing the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	edit($id)
				{
					if	(Gate::denies('role_admin'))
					{
						return	back();
					}

					$role	=	\App\Role::where('id',	'=',	$id)->first();

					return	view('role.role_edit',	['role'	=>	$role]);
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
					$role																			=	\App\Role::find($id);
					$role->role_description	=	htmlspecialchars($request->input('role_description'));
					$role->save();
					return	redirect()->action('RoleController@index');
				}

				/**
					* Remove the specified resource from storage.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	destroy($id)
				{
					\App\Role::destroy($id);
					return	redirect()->action('RoleController@index');
				}

			}
			