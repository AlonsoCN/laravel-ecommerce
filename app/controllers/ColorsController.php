<?php 

class ColorsController extends BaseController 
{
	public $restful = true;

	public function index()
	{
		$color = Color::all();
		$json_color = $color->toArray();

		$rtn = array(
			'status' => 200,
			'message' => null,
			'data' => array(
				'color' => $json_color
			)
		);
		return $rtn;
	}

	public function show($id)
	{
		$color = Color::find($id);

		if(is_null($color))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No color found',
				'data'=> null
			);
			return $rtn;
		}
		else
		{
			$json_color = $color->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'color' => $json_color
				)
			);
			return $rtn;
		}
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Color::$rules);

		try {
			if ($validator->passes())
			{
				$color = new Color;
				$color->producto_id = Input::get('producto_id');
				$color->name = Input::get('name');
				$color->price = Input::get('price');
				$color->save();

				$json_color = $color->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'color added',
					'data' => $json_color
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
		$color = Color::find($id);

		if(is_null($color))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No color found',
				'data'=> null
			);
			return $rtn;
		}
		else
		{
			$validator = Validator::make(Input::all(), Color::$rules);

			if($validator->passes())
			{
				$color->product_id = Input::get('product_id');
				$color->name = Input::get('name');
				$color->price = Input::get('price');
				$color->save();

				$json_color = $color->toArray();
				
				$rtn = array(
					'status' => 200,
					'message' => 'color updated',
					'data' => $json_color
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
		$color = Color::find($id);

		try
		{
			if(is_null($color))
			{
				$rtn = array(
					'status' => 404,
					'message' => 'No color found',
					'data'=> null
				);
			} else {
				$json_color = $color->toArray();
				$color->delete();
				$rtn = array(
					'status' => 200,
					'message' => 'color deleted',
					'data' => $json_color
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