<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Gate;
use App\User;
use App\Businesses;

class ShopController extends Controller
{

    /**
     * [Display Shopkeeper Dashboard]
     * @return [type] [description]
     */
    public function dashboard()
    {
    	$shop =  Auth::user()->load('business');
    	return view('shop.dash', compact('shop'));
    }


    /**
     * [Display Shopkeeper's Shop(Business) Profile]
     * @param  [string] $shop [id]
     * @return [type]       [description]
     */
    public function profile($shop)
    {
    	$business = Businesses::findOrFail($shop);
    	return $business;
    }


    /**
     * [edit_shop description]
     * @param  [type] $shop [description]
     * @return [type]       [description]
     */
    public function edit_shop($shop)
    {
    	$shops = Businesses::findOrFail($shop);
    	if(Gate::allows('access', $shops))
        {
            return view('shop.edit', compact('shops'));
        }
        else
        {
            return back();
        }
	}


    /**
     * [Update the Shopkeer's Shop (Business). Allow for File Upload]
     * @param  Request $request [Request]
     * @param  [type]  $shop    [Business Model instance]
     * @return [type]
     */
	public function update_shop(Request $request, $shop)
    {
    	$shops = Businesses::findOrFail($shop);
    	if($file = $request->hasFile('image'))
    	{
            $file = $request->file('image');
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path().'/uploads/logo', $name);
    		$shops = Businesses::where('id', $shop)->update(['image' => $name,]);
    	}
        else{
            $shops->update($request->all());
        }
        return back();
	}
}
