<?php

class LoginController extends BaseController {

	public function loginPage()
	{
		return View::make('BackEnd.login');
	}

}