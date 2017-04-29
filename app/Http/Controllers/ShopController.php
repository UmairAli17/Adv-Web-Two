<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Gate;
use App\User;
use App\Businesses;
use PDF;
class ShopController extends Controller
{

    /**
     * [Display All Shops]
     * @return Shop Collection
    */
    public function all()
    {
        $shops = Businesses::all();
        return view('home', compact('shops'));
    }

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
    	$business = Businesses::with('products', 'user')->findOrFail($shop);
    	return view('shop.profile', compact('business'));
    }


    /**
     * [edit_shop description]
     * @param  [type] $shop [description]
     * @return [type]       [description]
     */
    public function editShop($shop)
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
	public function updateShop(Request $request, $shop)
    {
    	$shops = Businesses::findOrFail($shop);
    	if($file = $request->hasFile('image'))
    	{
            $file = $request->file('image');
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path().'/uploads/logo', $name);
    		$shops->update([
                'image' => $name,
                'name' => $request->name,
                'description' => $request->description,
            ]);
    	}
        else{
            $shops->update($request->all());
        }
        return back();
	}

    /**
     * Display Current User's Business Orders
     */
    public function viewBusinessOrders()
    {
        $shopOrders = Auth::user()->load('business.orders.products');
        return view('shop.orders', compact('shopOrders'));
    }

    /**
     * [Download PDF of Shop Orders]
     * @return PDF with Orders
     */
    public function downloadPDF()
    {
        $shopOrders = Auth::user()->load('business.orders.products');
        $pdf = PDF::loadView('shop.print', compact('shopOrders'));
        return $pdf->download($shopOrders->business->name.' orders.pdf');
    }

    
}
