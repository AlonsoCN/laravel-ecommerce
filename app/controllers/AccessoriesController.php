<?php 

class AccessoriesController extends BaseController 
{
	public $restful = true;

	public function index()
	{
		$accessories = Accessory::all();
		$json_accessories = $accessories->toArray();

		$rtn = array(
			'status' => 200,
			'message' => null,
			'data' => array(
				'accessories' => $json_accessories
			)
		);
		return $rtn;
	}

	public function show($id)
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
			$json_accessory = $accessory->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'accessory' => $json_accessory
				)
			);
			return $rtn;
		}
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Accessory::$rules);

		try {
			if ($validator->passes())
			{
				$accessory = new Accessory;
				$accessory->producto_id = Input::get('producto_id');
				$accessory->name = Input::get('name');
				$accessory->price = Input::get('price');
				$accessory->save();

				$json_ac = $accessory->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'accessory added',
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