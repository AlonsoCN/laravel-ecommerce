<?php 

class AttributesController extends BaseController 
{
	public $restful = true;

	public function index()
	{
		$attributes = Attribute::all();

		if(is_null($attributes))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No attributes found',
				'data'=> null
			);
		}
		else
		{
			$json_data = $attributes->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'attributes' => $json_data
				)
			);
		}
		return Response::json($rtn);
	}

	public function show($id)
	{
		$attribute = Attribute::find($id);

		if(is_null($attribute))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No attribute found',
				'data'=> null
			);
		}
		else
		{
			$json_data = $attribute->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'attribute' => $json_data
				)
			);
		}
		return Response::json($rtn);
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Attribute::$rules);

		try {
			if ($validator->passes())
			{
				$attribute = new Attribute;
				$attribute->producto_id = Input::get('producto_id');
				$attribute->name = Input::get('name');
				$attribute->price = Input::get('price');
				$attribute->description = Input::get('description');
				$attribute->save();

				$json_data = $attribute->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'attribute added',
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
		$attribute = Attribute::find($id);

		if(is_null($attribute))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No attribute found',
				'data'=> null
			);
		}
		else
		{
			$validator = Validator::make(Input::all(), Attribute::$rules);

			if($validator->passes())
			{
				$attribute->producto_id = Input::get('producto_id');
				$attribute->name = Input::get('name');
				$attribute->price = Input::get('price');
				$attribute->description = Input::get('description');
				$attribute->save();

				$json_data = $attribute->toArray();
				
				$rtn = array(
					'status' => 200,
					'message' => 'attribute updated',
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
		return Response::json($rtn);
	}

	public function destroy($id) 
	{
		$attribute = Attribute::find($id);

		try
		{
			if(is_null($attribute))
			{
				$rtn = array(
					'status' => 404,
					'message' => 'No attribute found',
					'data'=> null
				);
			} 
			else
			{
				$json_data = $attribute->toArray();
				$attribute->delete();
				$rtn = array(
					'status' => 200,
					'message' => 'attribute deleted',
					'data' => $json_data
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