<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * [roles Users Has Many Roles: ManytoMany]
     * @return [type] [Return ManytoMany Relationship]
     */
    public function roles()
    {
        return $this->belongsToMany(Roles::class);
    }
    
    /**
     * [hasRole Check Whether User has Specified Role]
     * @param  [string]  $role [role name]
     * @return boolean | Array/Collection
     */
    public function hasRole($role)
    {
        if(is_string($role))
        {
            return $this->roles->contains('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }

    /**
     * [User can only have one Business]
     * @return [type] [description]
     */
    public function business()
    {
        return $this->hasOne(Businesses::class);
    }


    /**
     * [Get all Of Current User's Products through their Business]
     * @return [type] [Has Many Relationship]
     */
    public function products()
    {
        return $this->hasManyThrough(Products::class, Businesses::class, 'user_id', 'businesses_id');
    }

    /**
     * [Get all of User's Orders through the Products Orders Class (Models)]
     * @return [type] [Has Many Relationship]
     */
    public function product_orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }


    /**
     * [Confirm Where User Instance Owns the Related Model 
     * through PK id and FK 'user_id']
     * @param  [String] $relation [Model]
     * @return [boolean]           [True/False]
     */
    public function owns($relation)
    {
        return $this->id === $relation->user_id;
    }

    /**
     * [Get Product where User Has Role of Shopkeeper and there is a Relation between the user, their business and the product]
     * @param  [type]  $product Products Model
     * @return 
     */
    public function isShopkeeperOf($product)
    {
        if($this->hasRole('shopkeeper'))
        {
            return $this->products()->where('products.id', $product->id)->first();
            //return $this->business->products()->where('id', $product->id)->first();
        }
    }

}
