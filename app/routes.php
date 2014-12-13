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

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));

Route::get('/user/{username}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));

/*
/ Authenticated group
*/
Route::group(array('before' => 'auth'), function() {

	/*
	/ CSRF protection group
	*/
	Route::group(array('before' => 'csrf'), function() {

		/*
		/ Change password (POST)
		*/
		Route::post('/account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
		));	

	});

	/*
	/ Change password (GET)
	*/
	Route::get('/account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'
	));

	/*
	/ Sign out (GET)
	*/
	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));

});

/*
/ Unauthenticated group
*/
Route::group(array('before' => 'guest'), function() {

	/*
	/ CSRF protection group
	*/
	Route::group(array('before' => 'csrf'), function() {
		/*
		/ Create account (POST)
		*/
		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		/*
		/ Sign in (POST)
		*/
		Route::post('/account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));
	});

	/*
	/ Forgot password (GET)
	*/
	Route::get('/account/forgot-password', array(
		'as' => 'account-forgot-password',
		'uses' => 'RemindersController@getRemind'
	));

	/*
	/ Forgot password (POST)
	*/
	Route::post('/account/forgot-password', array(
		'as' => 'account-forgot-password-post',
		'uses' => 'RemindersController@postRemind'
	));

	/*
	/ Reset password (GET)
	*/
	Route::get('/account/reset-password/{token}', array(
		'as' => 'account-reset-password',
		'uses' => 'RemindersController@getReset'
	));

	/*
	/ Reset password (POST)
	*/
	Route::post('/account/reset-password/{token}', array(
		'as' => 'account-reset-password-post',
		'uses' => 'RemindersController@postReset'
	));

	/*
	/ Sign in (GET)
	*/
	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'
	));

	/*
	/ Create account (GET)
	*/
	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));
});
