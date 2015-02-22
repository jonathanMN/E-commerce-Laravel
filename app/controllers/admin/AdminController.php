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
		return 	View::make('admin.users.list-users')
				->with('users', User::all());
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
			're_password' 	=> 'required|same:password',
			'email' 		=> 'required|email|unique:users'
		));

		if ($validator->fails())
		{
			return 	$validator->errors();
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
				return 	array('success' => true);
			}
		}
	}

	public function editView($id)
	{
		return json_encode(User::find($id));
	}

	public function deleteUser1($id)
	{
		$id = User::find($id);
		$id->delete();
		return 	Redirect::route('list-users')
				->with('message', 'Record Deleted');
	}

	public function deleteUser2()
	{
		$id = Input::get('u_id');
		$loop = count($id) - 1;
		for ($i = 0; $i <= $loop; $i++)
		{
			$u = User::find($id[$i]);
			$u->delete();
			if ($u && $i == $loop)
				return 	Redirect::route('list-users')
						->with('message', 'Record/s Deleted');
		}
	}

}