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


    public function categoriesNotBelong()
    {
        $ids = $this->categories()->pluck('id');

        return Category::whereNotIn('id', $ids)->get();

    }

    public function discountPrice()
    {

        return ($this->discount_pct * $this->price)/100;
        
    }

    /* If Product has Discount, Return The New Price .. If not, Return actual price */
    public function netPrice(){

        $price = $this->price;

        if($this->hasDiscount()){

        	$discount = $this->discountPrice();
        	$price -= $discount;

        }


    	return $price;

    }


    public function quantitiesPrice()
    {
        
        return $this->netPrice() * $this->pivot->quantity;
    }


}
