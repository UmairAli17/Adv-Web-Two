<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	/**
	 * 	One to Many Relation Inverse: Order to Product
	 * @return [type] [description]
	 */
    public function products()
    {
    	return $this->belongsTo(Products::class, 'products_id');
    }

    /**
     * 	One to Many Relation Inverse: User Order
     * @return [type] [description]
     */
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
