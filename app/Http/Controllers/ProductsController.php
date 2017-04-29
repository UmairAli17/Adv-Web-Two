<?php

namespace App\Http\Controllers;

use Auth;
use Gate;
use App\User;
use App\Businesses;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
class ProductsController extends Controller
{
    /**
     * Display all Products or Search if a Request is Sent through Search Box
     */
    public function all(Request $request)
    {
        $query = $request->q;
            $products = $query
                ? Products::search($query)->get()
                : Products::with('business')->get();
        return view('products.all', compact('products'));
    }


    /**
     * [Display the Product]
     * @param  [type]  $id      [Product Model]
     * @return [type]           [description]
     */
    public function view($id)
    {
        $product = Products::with('business')->findOrFail($id);
        return view('products.view', compact('product'));
    }

	/**
	 * [Lazyload all the Current User's Products that are Connected to their business]
	 * @return [type] [Collection]
	 */
	public function dashboard()
	{
		$products = Auth::user()->load('business.products');
		return view('shop.products.manage', compact('products'));
	}

	/**
	 * [Show Add Products Button]
	 */
    public function add()
    {
    	return view('shop.products.add');
    }

    /**
     * [Add All Details within Form from Request to DB Table]
     * @param  Request $request [Form Request]
     * @return [type]           [description]
     */
    public function create(ProductRequest $request)
    {
    	$product = new Products($request->all());
    	if($file = $request->hasFile('image'))
        {

            $file = $request->file('image');
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path().'/uploads/products', $name);
            $product['image'] = $name;
        }
    	$create = Auth::user()->business->products()->save($product);
        return redirect()->route('products.view', ['id' => $product->id]);
    }


     

    /**
     * [Show Edit Product Form. Bind Form to Product from ID Pased]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function edit(Request $request, $id)
    {
    	$product = Products::findOrFail($id);
    	if(Gate::allows('shopkeeper', $product))
        {
            return view('shop.products.edit', compact('product'));
        }
        return redirect()->route('home');
    }

    /**
     * [Update Product by ID Passed]
     * @param  Request $request [description]
     * @param  [type]  $id      Product Model Instance
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
    	$product = Products::findOrFail($id);
        if(Gate::allows('shopkeeper', $product))
    	{
            if($file = $request->hasFile('image'))
            {
                $file = $request->file('image');
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path().'/uploads/products', $name);
                $product->update([
                    'image' => $name,
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                ]);
                return redirect()->route('products.view', ['id' => $product->id]);
            }
            else{
                $product->update($request->all());
                return redirect()->route('products.view', ['id' => $product->id]);
            }
        }
        return back();
    }

    /**
     * [Delete Product by ID Passed But only if User is the Shopkeeper]
     * @param  Request $request [description]
     * @param  [type]  $id      Product Model Instance
     * @return [type]           [description]
     */
    public function delete($id)
    {
        $product = Products::findOrFail($id);
        if(Gate::allows('shopkeeper', $product))
        {
            $product->delete();
        }
        return redirect()->route('home');
    }
}
