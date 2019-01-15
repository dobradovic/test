<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $fillable = ['customer_id','status'];

	public function customer()
	{
	    return $this->belongsTo(Customer::class);
	}

	public function product()
	{
		return $this->belongsToMany(Product::class);
	}

}
