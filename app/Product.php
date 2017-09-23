<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $guarded = []; 


    // public function scopeProducts()
    // {
        
    //     Post::all();

    // }


    /* A Product May Belongs To Many Categories */
    public function categories(){

    	return $this->belongsToMany(Category::class);
    }



    /* A Product May be Added To Many Baskets */
    public function baskets(){

        return $this->belongsToMany(Basket::class);
    }


    /*Return True if a Product has Discount and fals if not*/
    public function hasDiscount()
    {

    	return $this->discount_pct != 0 ? true : false;


    }


    /* If Product has Discount, Return The New Price */
    public function priceAfterDiscount(){

    	$discount = ($this->discount_pct * $this->price)/100;
    	$newPrice = $this->price - $discount;

    	return $newPrice;

    }

}
