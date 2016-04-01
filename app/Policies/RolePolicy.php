<?php

			namespace	App\Policies;

			use	Illuminate\Auth\Access\HandlesAuthorization;
			use	\App\User;

			class	RolePolicy
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

				public function role_admin(User $user){
					return $user->role==1;
				}

//				public	function 	role_staff(User	$user)
//				{
//					return	$user->role==2;
//				}

			}
			