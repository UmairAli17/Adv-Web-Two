<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{

	/**
	 * [permissions Role Can Belong to Many Permissions]
	 * @return [type] [ManytoMany Relationship]
	 */
	public function permissions()
	{
		return $this->belongsToMany(Roles::class);
	}
}
