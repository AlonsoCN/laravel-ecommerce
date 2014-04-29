<?php

class ProfilesController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function index()
	{
		$profiles = Profile::find($id);

		if(is_null($profiles))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No profiles found',
				'data'=> null
			);
		}
		else
		{
			$json_data = $profiles->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'profiles' => $json_data
				)
			);
		}
		return Response::json($rtn);
	}

	public function show($id)
	{
		$profile = Profile::find($id);

		if(is_null($profile))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No profile found',
				'data'=> null
			);
		}
		else
		{
			$json_data = $profile->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'profile' => $json_data
				)
			);
		}
		return Response::json($rtn);
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Profile::$rules);
		$rtn = array();

		try {
			if ($validator->passes())
			{
				$profile = new Profile;
				$profile->firstname = Input::get('firstname');
				$profile->lastname = Input::get('lastname');
				$profile->phone = Input::get('phone');
				$profile->celphone = Input::get('celphone');
				$profile->dni = Input::get('dni');
				$profile->address = Input::get('address');
				$profile->city = Input::get('city');
				$profile->country = Input::get('country');
				$profile->save();

				$json_data = $profile->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'profile added',
					'data' => $json_data
				);
			}
			else
			{
				$rtn = array(
					'status' => 804,
					'message' => 'missing field(s)',
					'data' => null
				);
			}
			return Response::json($rtn);
		}
		catch (Exception $e)
		{
			$rtn = array(
					'status' => 500,
					'message' => 'Error: '. $e,
					'data' => null
			);
			return Response::json($rtn);
		}
	}

	public function update($id)
	{
		$profile = Profile::find($id);

		try
		{
			if(is_null($profile))
			{
				$rtn = array(
					'status' => 404,
					'message' => 'No profile found',
					'data'=> null
				);
			}
			else
			{
				$validator = Validator::make(Input::all(), Profile::$rules);

				if($validator->passes())
				{
				    $profile->name = Input::get('name');
					$profile->firstname = Input::get('firstname');
					$profile->lastname = Input::get('lastname');
					$profile->phone = Input::get('phone');
					$profile->celphone = Input::get('celphone');
					$profile->dni = Input::get('dni');
					$profile->address = Input::get('address');
					$profile->city = Input::get('city');
					$profile->country = Input::get('country');
					$profile->save();

					$json_data = $profile->toArray();

					$rtn = array(
						'status' => 200,
						'message' => 'profile updated',
						'data' => $json_data
					);
				}
				else
				{
					$rtn = array(
						'status' => 804,
						'message' => 'missing field(s)',
						'data' => null
					);
				}
			}
		}
		catch (Exception $e)
		{
			$rtn = array(
					'status' => 500,
					'message' => 'Error: '. $e,
					'data' => null
			);
		}
		return Response::json($rtn);
	}

	public function destroy($id)
	{
		$profile = Profile::find($id);

		try
		{
			if(is_null($profile))
			{
				$rtn = array(
					'status' => 404,
					'message' => 'No profile found',
					'data'=> null
				);
			} else {
				$json_data = $profile->toArray();
				$profile->delete();
				$rtn = array(
					'status' => 200,
					'message' => 'profile deleted',
					'data' => $json_data
				);
			}
		}
		catch (Exception $e)
		{
			$rtn = array(
					'status' => 500,
					'message' => 'Error: '. $e,
					'data' => null
			);
		}
		return Response::json($rtn);
	}
}
