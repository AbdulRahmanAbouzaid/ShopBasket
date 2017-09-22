<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public function categories(){

    	return $this->belongsToMany(Category::class);
    }

    public function hasDiscount()
    {
    	return $this->discount_pct != 0 ? true : false;
    }

    public function priceAfterDiscount(){

    	$discount = ($this->discount_pct * $this->price)/100;
    	$newPrice = $this->price - $discount;

    	return $newPrice;

    }
}
