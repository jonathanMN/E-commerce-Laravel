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

/**
 * Sign in page
 */
Route::get('site-admin', array(
	'as'	=> 'admin-login',
	'uses'	=> 'LoginController@loginPage'
));

/**
 * Authenticated group
 */
Route::group(array('before' => 'auth'), function(){

	/**
	 * cross-site request forgery (CSRF) protection group
	 */
	Route::group(array('before' => 'csrf'), function(){

		/**
		* Create New User (POST)
		*/
		Route::post('/site-admin/add-users/create', array(
			'as' 	=> 'account-create-post',
			'uses' 	=> 'BackendController@userCreate'
		));
	});

	/**
	 * Create new User Page
	 */
	Route::get('/site-admin/add-users', array(
		'as' 	=> 'add-users',
		'uses'	=> 'BackendController@addUsers'
	));

	/**
	 * Sign Out
	 */
	Route::get('/site-admin/sign-out', array(
		'as' 	=> 'sign-out',
		'uses' 	=> 'BackendController@userSignout'
	));

});


/**
 * Unauthenticated group
 */
Route::group(array('before' => 'guest'), function(){

	/**
	 * cross-site request forgery (CSRF) protection group
	 */
	Route::group(array('before' => 'csrf'), function(){

		/**
		 * Sign in (POST)
		 */
		Route::post('/site-admin/sign-in', array(
			'as' 	=> 'user-sign-in',
			'uses'	=> 'BackendController@userSignin'
		));

	});

});