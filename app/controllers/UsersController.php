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
		return $rtn;
	}

	/*
	public function get($id = null)
	{
		if(is_null($id)) 
		{
			return User::all();
		} 
		else
		{
			$user = User::find($id);

			if(is_null($user))
			{
				return Response::json('El usuario no existe.', 404);
			}
			else
			{
				return $user;
			}
		}
	}

	public function create() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->telephone = Input::get('telephone');
			$user->save();

			return \Response::json(
			 		array('error' => false, 'data' => array('msg'=> 'Gracias por crear una cuenta.')),
			 		200);
		}

		return Response::json(
			array('error'=>true, 'msg'=>'No se creo el usuario.', 'validator'=>$validator), 
			404);
	}
	*/

	public function postSignin() 
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
			return $rtn;
		}

		$rtn = array(
			'status' => 804,
			'message' => 'invalid email or password',
			'data'=> null
		);
		return $rtn;
	}

	public function getSignout() 
	{
		Auth::logout();
		$rtn = array(
			'status' => 200,
			'message' => 'logout',
			'data'=> null
		);
		return $rtn;
	}
}
