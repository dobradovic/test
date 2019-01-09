<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
    	if($oldCart){
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;

    	}

    }

    public function add($product, $id){
    	$storedItem = ['qty' => 0, 'price' =>$product->real_selling_price, 'product' =>$product];
    	if($this->items){
    		if(array_key_exists($id, $this->items)){
    			$storedItem = $this->items[$id];
    		}
    	 }
    	$storedItem['qty']++;
    	$storedItem['price'] = $product->real_selling_price * $storedItem['qty'];
    	$this->items[$id] = $storedItem;
    	$this->totalQty++;
    	$this->totalPrice += $product->real_selling_price;

    }

    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['product']['real_selling_price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['product']['real_selling_price'];

        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
          unset($this->items[$id]);
    }

    public function removeItems($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
          unset($this->items[$id]);
    }



}
