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

    public static function getProductsBySearch($code, $name, $category_id, $category)
    {   
            
            if($name == null && $code ==null && $category=="everywhere")
                return Product::all();
                                  	
    		if($name != null && $code != null)
    			return Product::where('name', 'LIKE', '%' . $name . '%')->where('code', $code)->get();
    		if($code != null && is_null($name))
    			return Product::where('code', $code)->get();
    		if(is_null($code) && $name != null)
    			return Product::where('name', 'LIKE', '%' . $name . '%')->get();
    	   
            if($name == null && $code ==null && $category)
            return Product::where('category_id', $category)->get();

    


           

    }

    
}
