<?php

class CategoriesController extends BaseController
{
	public $restful = true;

	public function index()
	{
		$categories = Category::all();
		$json_categories = $categories->toArray();

		$rtn = array(
			'status' => 200,
			'message' => null,
			'data' => array(
				'categories' => $json_categories
			)
		);
		return Response::json($rtn);
	}

	public function show($id)
	{
		$category = Category::find($id);

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
			$json_categories = $category->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'categories' => $json_categories
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

				$json_category = $category->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'category added',
					'data' => $json_category
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

		if(is_null($category))
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No category found',
				'data'=> null
			);
			return $rtn;
		}
		else
		{
			$validator = Validator::make(Input::all(), Category::$rules);

			if($validator->passes())
			{
				if (Input::has('name'))
				{
				    $category->name = Input::get('name');
				}
				if (Input::has('description'))
				{
					$category->description = Input::get('description');
				}
				$category->save();

				$json_category = $category->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'category updated',
					'data' => $json_category
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
				$json_category = $category->toArray();
				$category->delete();
				$rtn = array(
					'status' => 200,
					'message' => 'category deleted',
					'data' => $json_category
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