<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    protected $table = 'businesses';

    protected $fillable = ['name', 'description', 'image'];

    /**
     * [One Business Connected to One User]
     * @return OnetoOne Relation
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }


    /**
     * [A Business Can have Many Products]
     * @return [type] [One to Many Relation]
     */
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
