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
    	return $shop;
    }
}
