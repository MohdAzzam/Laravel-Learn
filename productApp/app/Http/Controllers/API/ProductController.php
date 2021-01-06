<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Resources\Product as ProductResources;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
{

    public function index()
    {
        $products = Product::all();
        return $this->sendResponse(ProductResources::collection($products),
            'All Products Send ');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',

        ]);
        if ($validator->fails()) {
            return $this->sendError('Please validate Error ', $validator->errors(), '404');
        }
        $product = Product::create($input);
        return $this->sendResponse(new ProductResources($product), 'product Added Successfully');

    }

    public function show($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return $this->sendError('Product Not Found', '404');
        }
        return $this->sendResponse(new ProductResources($product), 'product Found Successfully');

    }


    public function update(Request $request, Product $product)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Please validate Error', $validator->errors(), '404');
        }
        $product->name = $input['name'];
        $product->details = $input['details'];
        $product->price = $input['price'];
        $product->save();
        return $this->sendResponse(new ProductResources($product), 'product updated Successfully');


    }

    public function destroy(Product $product)
    {
        $product->delete();
        return $this->sendResponse(new ProductResources($product), 'product deleted Successfully');

    }
}
