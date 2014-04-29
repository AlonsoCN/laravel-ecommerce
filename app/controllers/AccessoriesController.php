<?php 

class ProfilesController extends BaseController 
{
	public $restful = true;

	public function index()
	{
		$profiles = Profile::all();
		$json_profiles = $profiles->toArray();

		$rtn = array(
			'status' => 200,
			'message' => null,
			'data' => array(
				'profiles' => $json_profiles
			)
		);
		return Response::json($rtn);
	}

	public function show($id)
	{
		$profiles = Profile::find($id);

		if(is_null($profiles))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No profile found',
				'data'=> null
			);
		}
		else
		{
			$json_profiles = $profiles->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'profiles' => $json_profiles
				)
			);
		}
		return Response::json($rtn);
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Profile::$rules);

		try 
		{
			if ($validator->passes())
			{
				$profiles = new Profile;
				$profiles->producto_id = Input::get('producto_id');
				$profiles->name = Input::get('name');
				$profiles->price = Input::get('price');
				$profiles->save();

				$json_ac = $profiles->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'profile added',
					'data' => $json_ac
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

	public function update($id)
	{
		$accessory = Accessory::find($id);

		if(is_null($accessory))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No accessory found',
				'data'=> null
			);
			return $rtn;
		}
		else
		{
			$validator = Validator::make(Input::all(), Accessory::$rules);

			if($validator->passes())
			{
				$accessory->product_id = Input::get('product_id');
				$accessory->name = Input::get('name');
				$accessory->price = Input::get('price');
				$accessory->save();

				$json_accessory = $accessory->toArray();
				
				$rtn = array(
					'status' => 200,
					'message' => 'image updated',
					'data' => $json_accessory
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
		$accessory = Accessory::find($id);

		try
		{
			if(is_null($accessory))
			{
				$rtn = array(
					'status' => 404,
					'message' => 'No accessory found',
					'data'=> null
				);
			} else {
				$json_accessory = $accessory->toArray();
				$accessory->delete();
				$rtn = array(
					'status' => 200,
					'message' => 'image deleted',
					'data' => $json_accessory
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