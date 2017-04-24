<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Order;
use App\Products;
use Gate;
class OrderController extends Controller
{
	/**
	 * Add Product Order through Product Model and Append the Current Auth'd user to user_id
	 */
    public function addOrder(Request $request, $id)
    {
    	$productOrder = Products::findOrFail($id);
    	$order = new Order($request->all());
    	$order['user_id'] = Auth::user()->id;
    	$productOrder->orders()->save($order);
    	return redirect()->route('orders.mine');
    }


    /**
     * Display Currently Authenticated User's Orders
     */
    public function viewMyOrders()
    {
    	$orders = Auth::user()->load('product_orders.products');
    	// return $orders;
    	return view('orders.customers.all', compact('orders'));
    }


    /**
     * Delete order only if it belongs to that user
     */
    public function delete($id)
    {
    	$order = Order::findOrFail($id);
    	if(Gate::allows('owns_order', $order))
    	{
    		$order->delete();
    		return back();
    	}
    	return back();
    }
}
