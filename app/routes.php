<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'site-admin'), function(){

	/**
	 * Sign in page
	 */
	Route::get('/', array(
		'as'	=> 'admin-login',
		'uses'	=> 'LoginController@loginPage'
	));

	/**
	 * Authenticated group
	 */
	Route::group(array('before' => 'auth'), function(){

		/*
		 * FOR USERS
		 */
		Route::group(array('prefix' => 'users'), function(){
			// Create new User Page
			Route::get('add-users', array(
				'as' 	=> 'add-users',
				'uses'	=> 'AdminController@addUsers'
			));

			// List of Users
			Route::get('list', array(
				'as' 	=> 'list-users',
				'uses'	=> 'AdminController@users'
			));

			// cross-site request forgery (CSRF) protection group
			Route::group(array('before' => 'csrf'), function(){

				// Create New User
				Route::post('create', array(
					'as' 	=> 'account-create-post',
					'uses' 	=> 'AdminController@userCreate'
				));
			});
		});

		/**
		 * FOR CATEGORIES
		 */
		Route::group(array('prefix' => 'categories'), function() {
			
			// List of Categories
			Route::get('/', array(
				'as' 	=> 'list-categories',
				'uses'	=> 'CategoriesController@categories'
			));

			Route::get('view/{id}', array(
				'as' 	=> 'cat-id',
				'uses' 	=> 'CategoriesController@viewEdit'
			));

			// cross-site request forgery (CSRF) protection group
			Route::group(array('before' => 'csrf'), function(){
				// Add Category
				Route::post('create', array(
					'as'	=> 'create-category',
					'uses'	=> 'CategoriesController@newCategory'
				));

				// Update Category
				Route::post('update', array(
					'as' 	=> 'update-category',
					'uses' 	=> 'CategoriesController@updateCategory'
				));
			});
		});
		
		// Dashboard
		Route::get('dashboard', array(
			'as' 	=> 'dboard',
			'uses'	=> 'AdminController@dashboard'
		));

		// List of Products
		Route::get('products', array(
			'as' 	=> 'list-products',
			'uses'	=> 'AdminController@products'
		));

		// List of Brands
		Route::get('brands', array(
			'as' 	=> 'list-brands',
			'uses'	=> 'AdminController@brands'
		));

		// Sign Out
		Route::get('sign-out', array(
			'as' 	=> 'sign-out',
			'uses' 	=> 'AdminController@userSignout'
		));

	});

	/**
	 * Unauthenticated group
	 */
	Route::group(array('before' => 'guest'), function(){

		// cross-site request forgery (CSRF) protection group
		Route::group(array('before' => 'csrf'), function(){

			//Sign in (POST)
			Route::post('sign-in', array(
				'as' 	=> 'user-sign-in',
				'uses'	=> 'LoginController@userSignin'
			));

		});

	});

}); /* <-- site-admin */