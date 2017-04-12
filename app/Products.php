<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
   protected $fillable = ['name', 'description', 'image', 'price'];

   /**
    * [A Product May Only Belong to a Single Business]
    * @return  [One to Many Relation - Inverse]
    */
   public function business()
   {
   		return $this->belongsTo(Businesses::class, 'businesses_id');
   }
}
