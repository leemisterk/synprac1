<?php

			use	Illuminate\Database\Schema\Blueprint;
			use	Illuminate\Database\Migrations\Migration;

			class	CreateBookTable	extends	Migration
			{

				/**
					* Run the migrations.
					*
					* @return void
					*/
				public	function	up()
				{
					Schema::create('books',	function	(Blueprint	$table)
						{
						$table->increments('id');
						$table->string('book_title');
						$table->string('book_cover_image')->nullable();
						$table->integer('book_category')->nullable();
						$table->integer('book_level')->nullable();
						$table->timestamps();
						});
				}

				/**
					* Reverse the migrations.
					*
					* @return void
					*/
				public	function	down()
				{
					Schema::drop('books');
				}

			}
			