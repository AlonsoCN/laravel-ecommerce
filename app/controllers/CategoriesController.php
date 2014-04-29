<?php

class CategoriesController extends BaseController
{
	public $restful = true;

	public function index()
	{
		$categories = Category::all();

		if(count($categories) == 0)
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No categories found',
				'data'=> null
			);
		}
		else
		{
			$json_data = $categories->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'categories' => $json_data
				)
			);
		}
		return Response::json($rtn);
	}

	public function show($id)
	{
		$categories = Category::find($id);

		if(count($categories) == 0)
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No category found',
				'data'=> null
			);
		}
		else
		{
			$json_data = $categories->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'categories' => $json_data
				)
			);
		}
		return Response::json($rtn);
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Category::$rules);
		$rtn = array();

		try {
			if ($validator->passes())
			{
				$category = new Category;
				$category->name = Input::get('name');
				$category->description = Input::get('description');
				$category->save();

				$json_data = $category->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'category added',
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
		$category = Category::find($id);

		try
		{
			if(is_null($category))
			{
				$rtn = array(
					'status' => 404,
					'message' => 'No category found',
					'data'=> null
				);
			}
			else
			{
				$validator = Validator::make(Input::all(), Category::$rules);

				if($validator->passes())
				{
				    $category->name = Input::get('name');
					$category->description = Input::get('description');
					$category->images_id = Input::get('images_id');
					$category->users_id = Input::get('users_id');
					$category->save();

					$json_data = $category->toArray();

					$rtn = array(
						'status' => 200,
						'message' => 'category updated',
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
		$category = Category::find($id);

		try
		{
			if(is_null($category))
			{
				$rtn = array(
					'status' => 404,
					'message' => 'No category found',
					'data'=> null
				);
			} else {
				$json_data = $category->toArray();
				$category->delete();
				$rtn = array(
					'status' => 200,
					'message' => 'category deleted',
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