<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    //
	protected $fillable = ['name', 'slug', 'code', 'parent_category_id']; 

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
