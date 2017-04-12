<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Businesses;
use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
	/**
	 * [Lazyload all the Current User's Products that are Connected to their business]
	 * @return [type] [Collection]
	 */
	public function dashboard()
	{
		$products = Auth::user()->load('business.products');
		return view('shop.products.manage', compact('products'));
		// return $products->business->products;
	}

	/**
	 * [Show Add Products Button]
	 */
    public function add()
    {
    	return view('shop.products.add');
    }

    public function create(Request $request)
    {
    	$product = new Products($request->all());
    	if($file = $request->hasFile('image'))
        {

            $file = $request->file('image');
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path().'/uploads/products', $name);
            $newR['image'] = $name;
        }
    	$create = Auth::user()->business->products()->save($product);
    }
}
