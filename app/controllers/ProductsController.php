<?php 

class ProductsController extends BaseController 
{
	public $restful = true;

	public function index()
	{
		$products = Product::all();
		
		if(count($products) == 0)
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No products found',
				'data'=> null
			);
		}
		else
		{
			$json_products = $products->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'products' => $json_products
				)
			);
		}
		return Response::json($rtn);
	}

	public function show($id)
	{
		$product = Product::find($id);

		if(count($products) == 0)
		{
			$rtn = array(
				'status' => 404,
				'message' => 'No product found',
				'data'=> null
			);
		}
		else
		{
			$json_data = $product->toArray();

			$rtn = array(
				'status' => 200,
				'message' => null,
				'data' => array(
					'product' => $json_data
				)
			);
		}
		return Response::json($rtn);
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Product::$rules);

		try {
			if ($validator->passes())
			{
				$product = new Product;
				$product->category_id = Input::get('category_id');
				$product->title = Input::get('title');
				$product->description = Input::get('description');
				$product->price = Input::get('price');
				$product->availability = Input::get('availability');
				$product->users_id = Input::get('users_id');
				$product->save();

				$json_data = $product->toArray();

				$rtn = array(
					'status' => 200,
					'message' => 'product added',
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
		$product = Product::find($id);

		try
		{
			if(is_null($product))
			{
				$rtn = array(
					'status' => 404,
					'message' => 'No product found',
					'data'=> null
				);
			}
			else
			{
				$validator = Validator::make(Input::all(), Product::$rules);

				if($validator->passes())
				{
					$product->category_id = Input::get('category_id');
					$product->title = Input::get('title');
					$product->description = Input::get('description');
					$product->price = Input::get('price');
					$product->availability = Input::get('availability');
					$product->users_id = Input::get('users_id');
					$product->save();

					$json_data = $product->toArray();
					
					$rtn = array(
						'status' => 200,
						'message' => 'product updated',
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
		$product = Product::find($id);

		try
		{
			if(is_null($product))
			{
				$rtn = array(
					'status' => 404,
					'message' => 'No product found',
					'data'=> null
				);
			} else {
				$json_data = $product->toArray();
				$product->delete();
				$rtn = array(
					'status' => 200,
					'message' => 'product deleted',
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