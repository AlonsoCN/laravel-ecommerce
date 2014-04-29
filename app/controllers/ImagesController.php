<?php 

class ImagesController extends BaseController 
{
	public $restful = true;

	public function index()
	{
		$images = Image::all();

		if(is_null($images))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No images found',
				'data'=> null
			);
		}
		else
		{
			$json_data = $images->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'images' => $json_data
				)
			);
		}
		return Response::json($rtn);
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
		}
		else
		{
			$json_data = $image->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'image' => $json_data
				)
			);
		}
		return Response::json($rtn);
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Image::$rules);

		try {
			if ($validator->passes())
			{
				$image = new Image;
				$image->file_name = Input::get('file_name');
				$image->description = Input::get('description');
				$image->save();

				$json_data = $image->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'image added',
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
			}
			else
			{
				$validator = Validator::make(Input::all(), Image::$rules);

				if($validator->passes())
				{
					$image->file_name = Input::get('file_name');
					$image->description = Input::get('description');
					$image->save();

					$json_data = $image->toArray();
					
					$rtn = array(
						'status' => 200,
						'message' => 'image updated',
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
				$json_data = $imagen->toArray();
				$imagen->delete();
				$rtn = array(
					'status' => 200,
					'message' => 'image deleted',
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