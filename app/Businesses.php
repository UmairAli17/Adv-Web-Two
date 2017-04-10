<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    protected $table = 'businesses';

    /**
     * [One Business Connected to One User]
     * @return OnetoOne Relation
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
