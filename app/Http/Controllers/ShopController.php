<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Businesses;

class ShopController extends Controller
{
    public function dashboard()
    {
    	$shop =  Auth::user()->load('business');
    	return view('shop.dash', compact('shop'));
    }

    public function profile($shop)
    {
    	$business = Businesses::findOrFail($shop);
    	return $business;
    }

    public function edit_shop($shop)
    {
    	$shops = Businesses::findOrFail($shop);
    	return view('shop.edit', compact('shops'));
	}

	public function update_shop(Request $request, $shop)
    {
    	$shops = Businesses::findOrFail($shop);
    	$file = $request->image;
    	if($file = $request->image;)
    	{
            $file = $request->file('image');
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path().'/uploads/logo', $name);
    		$shops['image'] = $name;
    	}
        $shops->update($request->all());
	}
}
