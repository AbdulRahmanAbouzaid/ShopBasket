<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Basket;
use App\Product;

class BasketsController extends Controller
{

	public function show()
    {

        $basket = Basket::getCurrentBasket();

    	return view('baskets.basket', compact('basket'));

    }

    public function addProduct(Product $product)
    {
    	
    	$basket = Basket::getCurrentBasket();

    	$basket->products()->attach($product,['quantity' => request('quantity')]);

    	return redirect('/basket');

    }

    public function destroy(Product $product)
    {
        $basket = Basket::getCurrentBasket();

        $basket->products()->detach($product);

        return redirect('/');

    }
}
