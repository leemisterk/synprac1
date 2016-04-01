<?php

			namespace	App\Http\Controllers;

			use	Illuminate\Http\Request;
			use	App\Http\Requests;
			use	Storage;
			use	File;
			use	Auth;
			use	Gate;

			class	BController	extends	Controller
			{

				/**
					* Display a listing of the resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	index()
				{
					return	view('b.index');
				}

				public	function	books()
				{
					if	(Request::ajax())
					{
						$books	=	array(
						'Alice in Wonderland',
						'Tom Sawyer',
						'Gulliver\'s Travels',
						'Dracula',
						'Leaves of Grass'
						);
						return	Response::json($books);
					}
				}

			}
			