<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function getTitleAttribute($value)
	{
		return strtoupper($value);
	}
}
