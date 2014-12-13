<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('account.forgot');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch ($response = Password::remind(Input::only('email'), function($message) {
			$message->subject('Password Reminder');
		}))
		{
			case Password::INVALID_USER:
				return Redirect::route('account-forgot-password')->with('global', 'Sorry but your email address was not found. Please Register!');

			case Password::REMINDER_SENT:
				return Redirect::route('home')->with('global', 'A link to reset your password has been sent to your email address.');
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('account.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
				if(empty(Input::get('password')) || empty(Input::get('password_confirmation'))) {
					return Redirect::back()->with('global', 'Both password fields are required.');			
				}
				return Redirect::back()->with('global', 'The passwords you have provided do not match!');
			
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				if(empty(Input::get('email'))) {
					return Redirect::back()->with('global', 'Please enter your email address.');
				}
				return Redirect::back()->with('global', 'Your email address was not found!');

			case Password::PASSWORD_RESET:
				return Redirect::route('home')->with('global', 'Congratulations! You have successfully reset your password!');
		}

	}
}
