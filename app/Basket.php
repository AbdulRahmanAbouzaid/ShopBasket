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

    public function customer()
    {
        return $this->belongsTo(User::class);
    }


    /* Get The Basket That the User should Use*/
    public function scopeGetCurrentBasket($user_id = null)
    {


    	//Get Current Basket
    	$basket = Basket::where('user_id',$user_id)
                        ->where('status','hanging')
                        ->first();

    	//if exist return it , else Create new One
    	if(!$basket){
			
			$basket = Basket::create(['number' => 4,'status' => 'hanging']);

		}
			
			return $basket;
    
	}

    /* Get Basket Price Before Discount */
    public function totalActualPrice()
    {

        $actualTotal = 0; 

        foreach ($this->products as $product) {
            
            $price = $product->price;

            $quantity = $product->pivot->quantity;

            $actualTotal += $price * $quantity;

        }

        return $actualTotal;

    }

    /* Get Basket Price After Discount */
    public function totalNetPrice()
    {

        $netTotal = 0;

        foreach ($this->products as $product) {
            
            $price = $product->netPrice();

            $quantity = $product->pivot->quantity;

            $netTotal += $price * $quantity;

        }

        return $netTotal;

    }


    public function discountPercentage()
    {

        $total = $this->totalActualPrice();

        $discount = $total - $this->totalNetPrice();

        $discount_pct = ($discount / $total) * 100;

        return $discount_pct;
    }

}