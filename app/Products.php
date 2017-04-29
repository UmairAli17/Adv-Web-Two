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

  /**
    * [A Product May Have Many Orders]
    * @return  [One to Many Relation - Inverse]
    */
   public function orders()
   {
   		return $this->hasMany(Order::class, 'products_id');
   }


   /**
    * Scope for Searching for Products
      Allow to Search for Product Through Business Name
    */
   public function scopeSearch($query, $search)
   {
     $query->where('name', 'LIKE', "%$search%")
                ->orWhereHas('business', function($query) use ($search) {
                        $query->where('name', 'LIKE', "%$search%");
                });
   }


 

}
