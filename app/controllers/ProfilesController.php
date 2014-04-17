<?php 

class ProfilesController extends BaseController 
{
	public $restful = true;

	public function index()
	{
		$profile = Profile::all();
		$json_profile = $profile->toArray();

		$rtn = array(
			'status' => 200,
			'message' => null,
			'data' => array(
				'profile' => $json_profile
			)
		);
		return $rtn;
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
			return $rtn;
		}
		else
		{
			$json_profile = $profile->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'profile' => $json_profile
				)
			);
			return $rtn;
		}
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Profile::$rules);

		try {
			if ($validator->passes())
			{
				$profile = new Profile;
				


				$profile->save();

				$json_profile = $profile->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'profile added',
					'data' => $json_profile
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
			return $rtn;
		}
		catch (Exception $e)
		{
			$rtn = array(
					'status' => 500,
					'message' => 'Error: '. $e,
					'data' => null
			);
			return $rtn;
		}
	}

	public function update($id)
	{
		$profile = Profile::find($id);

		if(is_null($profile))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No profile found',
				'data'=> null
			);
			return $rtn;
		}
		else
		{
			$validator = Validator::make(Input::all(), Profile::$rules);

			if($validator->passes())
			{
				$profile->product_id = Input::get('product_id');
				$profile->name_label = Input::get('name_label');
				$profile->save();

				$json_profile = $profile->toArray();
				
				$rtn = array(
					'status' => 200,
					'message' => 'profile updated',
					'data' => $json_profile
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
			return $rtn;
		}
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
				$json_profile = $profile->toArray();
				$profile->delete();
				$rtn = array(
					'status' => 200,
					'message' => 'profile deleted',
					'data' => $json_profile
				);
			}
			return $rtn;
		}
		catch (Exception $e)
		{
			$rtn = array(
					'status' => 500,
					'message' => 'Error: '. $e,
					'data' => null
			);
			return $rtn;
		}
	}
}
