<?php

			namespace	App\Policies;

			use	Illuminate\Auth\Access\HandlesAuthorization;
			use	\App\Book;
			use	\App\User;

			class	BookPolicy
			{

				use	HandlesAuthorization;

				/**
					* Create a new policy instance.
					*
					* @return void
					*/
				public	function	__construct()
				{
					//
				}

				public	function	editor(User	$user)
				{
					return $user->role==2;
				}

			}
			