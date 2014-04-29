<?php

class UsersController extends BaseController {

	public function __construct() {
		//parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function index()
	{
		$view = View::make('login')->render();
		$rtn = array(
			'status' => 805,
			'message' => null,
			'data'=> array(
				'login_form' => $view,
			)		
		);
		return Response::json($rtn);
	}

	public function login() 
	{
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) 
		{
			$email = Input::get('email');
			$user = User::where('email', $email)->get();
			$rtn = array(
				'status' => 200,
				'message' => 'logged',
				'data'=> array(
					'user' => $user
				)		
			);
			return Response::json($rtn);
		}

		$rtn = array(
			'status' => 804,
			'message' => 'invalid email or password',
			'data'=> null
		);
		return Response::json($rtn);
	}

	public function logout() 
	{
		Auth::logout();
		$rtn = array(
			'status' => 200,
			'message' => 'logout',
			'data'=> null
		);
		return Response::json($rtn);
	}
}
