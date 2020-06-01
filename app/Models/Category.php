<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = "id";


	protected $fillable = ['title', 'slug'];

	public $timestamps = false;

	/* Relations */

	public function news()
	{
		 return $this->hasMany(News::class, 'category_id', 'id');
		 return $this->belongsToMany(News::class, 'news_has_category',
		 'category_id', 'news_id');
	}
}
