<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
	/**
	 * [roles Permission Can Belong to Many Roles]
	 * @return [type] [ManytoMany Relationship]
	 */
    public function roles()
 	{
 		return $this->belongsToMany(Roles::class);
 	}
}
