<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Basket;
use App\Product;
use App\Invoice;

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

        return redirect('/basket');

    }


    public function confirmPurchase()
    {
        
        $basket = Basket::getCurrentBasket();

        $invoice = new Invoice([

            'basket_id' => $basket->id,

            'inv_total' => $basket->totalActualPrice(),

            'inv_discount' => $basket->discountPercentage(),

            'inv_net' => $basket->totalNetPrice()

        ]);

        $invoice->save();

        return redirect('/basket/invoice/'.$invoice);

    }

    public function showInvoice(Invoice $invoice)
    {
        
        return view('baskets.invoice', compact('invoice'));
    }
}
