<?php

class AdminController extends BaseController {

	public function dashboard()
	{
		return View::make('admin.dashboard');
	}

	public function addUsers()
	{
		return View::make('admin.users.add-users');
	}

	public function users()
	{
		return View::make('admin.users.list-users');
	}

	public function products()
	{
		return View::make('admin.products.list-products');
	}

	public function brands()
	{
		return View::make('admin.brands.list-brands');
	}

	public function userSignout()
	{
		Auth::logout();
		return Redirect::route('admin-login');
	}

	public function userCreate()
	{
		$validator = Validator::make(Input::all(), array(
			'username' 		=> 'required|max:25|min:3|unique:users',
			'password' 		=> 'required|min:6',
			're-password' 	=> 'required|same:password',
			'email' 		=> 'required|email|unique:users'
		));

		if ($validator->fails())
		{
			return 	Redirect::route('add-users')
					->withErrors($validator)
					->withInput();
		}
		else
		{
			$user = User::create(array(
				'username' 	=> Input::get('username'),
				'password' 	=> Hash::make(Input::get('password')),
				'email' 	=> Input::get('email')
			));

			if ($user)
			{
				return 	Redirect::route('add-users')
						->with('message', 'Account Created');
			}
		}
	}

}