<?php

class LoginController extends BaseController {

	public function loginPage()
	{
		return View::make('admin.login');
	}

	public function userSignin()
	{
		$validator = Validator::make(Input::all(), array(
			'username' => 'required',
			'password' => 'required'
		));

		if ($validator->fails())
		{
			return 	Redirect::route('admin-login')
					->withErrors($validator)
					->withInput();
		}
		else
		{
			$remember = (Input::has('remember')) ? true : false;

			$auth = Auth::attempt(array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			), $remember);

			if ($auth)
			{
				return Redirect::route('add-users');
			}
			else
			{
				return 	Redirect::route('admin-login')
						->withErrors($validator)
						->withInput()
						->with('error-message', 'Username/Password wrong.');
			}
		}
	}

}