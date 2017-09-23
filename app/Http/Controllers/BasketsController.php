<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Basket;
use App\Product;

class BasketsController extends Controller
{

	public function show(Basket $basket)
    {

    	return view('baskets.basket', compact('basket'));

    }

    public function addProduct(Product $product)
    {
    	
    	// $this->validate(request(),[

    	// 	'quantity' => 'numeric|between:1,'

    	// ]);

    	$basket = Basket::find(1);

    	$basket->products()->attach($product,['quantity' => request('quantity')]);

    	return redirect('baskets/'.$basket->id);

    }
}
