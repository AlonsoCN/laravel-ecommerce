<?php 

class ImagesController extends BaseController 
{
	public $restful = true;

	public function index()
	{
		$image = Image::all();
		$json_images = $image->toArray();

		$rtn = array(
			'status' => 200,
			'message' => null,
			'data' => array(
				'image' => $json_images
			)
		);
		return $rtn;
	}

	public function show($id)
	{
		$image = Image::find($id);

		if(is_null($image))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No image found',
				'data'=> null
			);
			return $rtn;
		}
		else
		{
			$json_images = $image->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'image' => $json_images
				)
			);
			return $rtn;
		}
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Image::$rules);

		try {
			if ($validator->passes())
			{
				$image = new Image;
				$image->producto_id = Input::get('producto_id');
				$image->name_life = Input::get('name_life');
				$image->save();

				$json_image = $image->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'image added',
					'data' => $json_image
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
		$image = Image::find($id);

		if(is_null($image))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No image found',
				'data'=> null
			);
			return $rtn;
		}
		else
		{
			$validator = Validator::make(Input::all(), Image::$rules);

			if($validator->passes())
			{
				$image->product_id = Input::get('product_id');
				$image->name_label = Input::get('name_label');
				$image->save();

				$json_image = $image->toArray();
				
				$rtn = array(
					'status' => 200,
					'message' => 'image updated',
					'data' => $json_image
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
		$image = Image::find($id);

		try
		{
			if(is_null($image))
			{
				$rtn = array(
					'status' => 404,
					'message' => 'No image found',
					'data'=> null
				);
			} else {
				$json_image = $imagen->toArray();
				$imagen->delete();
				$rtn = array(
					'status' => 200,
					'message' => 'image deleted',
					'data' => $json_image
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