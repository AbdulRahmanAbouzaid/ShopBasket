<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
	protected $guarded = [];

    /* A Basket Contains Multiple Products */
    public function products()
    {
    	
    	return $this->belongsToMany(Product::class)->withPivot('quantity');

    }

    public function scopeGetCurrentBasket()
    {


    	//Get  Current status
    	$basket = Basket::where('status','hanging');

    	//if exist return it , else Create new One
    	if(!$basket){
			
			$basket = Basket::create(['number' => 4,'status' => 'hanging']);

		}
			
			return $basket;
    
	}

}