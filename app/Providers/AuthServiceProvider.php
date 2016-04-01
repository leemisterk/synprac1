<?php

			namespace	App\Providers;

			use	Illuminate\Contracts\Auth\Access\Gate	as	GateContract;
			use	Illuminate\Foundation\Support\Providers\AuthServiceProvider	as	ServiceProvider;

			class	AuthServiceProvider	extends	ServiceProvider
			{

				/**
					* The policy mappings for the application.
					*
					* @var array
					*/
				protected	$policies	=	[
//				'App\Model'	=>	'App\Policies\ModelPolicy',			

				];

				/**
					* Register any application authentication / authorization services.
					*
					* @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
					* @return void
					*/
				public	function	boot(GateContract	$gate)
				{
					$this->registerPolicies($gate);

//					$gate->before(function($user)
//						{
//						return	$user->role	==	1;
//						});

					$gate->define('role_admin',	function($user)
						{
						return	$user->role	===	1;
						});
						
					$gate->define('role_staff',	function($user)
						{
						return	$user->role	===	2;
						});
						
				$gate->define('role_guest', function($user){
				
					return $user->role===0;
				});
					//
				}

			}
			