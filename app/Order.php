<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
    	return $this->belongsTo(Products::class, 'products_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
