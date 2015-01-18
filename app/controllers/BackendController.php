<?php

class BackendController extends BaseController {

	public function addUsers()
	{
		return View::make('BackEnd.add-users');
	}

}