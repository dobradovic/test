<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class Product extends Model
{
    //
    protected $fillable = ['name', 'slug', 'code', 'buying_price', 'category_id', 'real_selling_price','wanted_selling_price','status'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getProductsBySearch($code, $name, $category_id)
    {
    	if($category === 'everywhere'){
    		if($name != null && $code != null)
    			return Product::where('name', 'LIKE', '%' . $name . '%')->where('code', $code)->first();
    		if($code != null && is_null($name))
    			return Product::where('code', $code)->first();
    		if(is_null($code) && $name != null)
    			return Product::where('name', 'LIKE', '%' . $name . '%')->get();
    	}

    

    		if($name != null && $code != null)
    			return Item::where('name', 'LIKE', '%' . $name . '%')->where('code', $code)->where('category_id', $category_id)->first();
    		if($code != null && is_null($name))
    			return Item::where('code', $code)->where('category_id', $category_id)->first();
    		if(is_null($code) && $name != null)
    			return Item::where('name', 'LIKE', '%' . $name . '%')->where('category_id', $category_id)->get();

    }

    
}
