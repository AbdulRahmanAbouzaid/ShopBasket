<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Basket;
use App\Product;
use App\Invoice;

class BasketsController extends Controller
{

    private $basket; 

    public function __construct()
    {
        
        $this->basket = Basket::getCurrentBasket();

    }


	public function show()
    {       
        $basket = $this->basket;

    	return view('baskets.basket', compact('basket'));

    }

    public function addProduct(Product $product)
    {
    	

    	$this->basket->products()->attach($product,['quantity' => request('quantity')]);

    	return redirect('/basket');

    }



    public function detachProduct(Product $product)
    {

        $this->basket->products()->detach($product);

        return redirect('/basket');

    }


    public function confirmPurchase()
    {
        

        $invoice = Invoice::create([

            'inv_number' => hexdec(uniqid()),

            'basket_id' => $this->basket->id,

            'inv_total' => $this->basket->totalActualPrice(),

            'inv_discount' => $this->basket->discountPercentage(),

            'inv_net' => $this->basket->totalNetPrice()

        ]);

        $this->basket->status = 'confirmed';

        return redirect('/basket/invoice/'.$invoice->id);

    }


    public function showInvoice(Invoice $invoice)
    {
        
        return view('baskets.invoice', compact('invoice'));
    }



    public function cancelling()
    {
        
        $this->basket->status = 'cancelled';

        $this->basket->save();

        return redirect('/');

    }


    public function destroy()
    {

        $this->basket->delete();

        return redirect('/');

    }
}
