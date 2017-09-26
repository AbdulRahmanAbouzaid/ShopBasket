<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Basket;
use App\Product;
use App\Invoice;
use App\Repositories\Invoices;

class BasketsController extends Controller
{

    private $basket; 

    public function __construct()
    {

        $this->middleware('auth');

        //Get the active Basket 
        $this->middleware(function ($request, $next) {
            
            $this->basket = auth()->user()->getCurrentBasket();

            return $next($request);
        });
    }




    /************************************
    ***     Show The User's basket    ***  
    ************************************/
	public function show()
    {       

        $basket = $this->basket;

    	return view('baskets.basket', compact('basket'));

    }




    /************************************
    ***  adding Product To the Basket ***
    ************************************/
    public function addProduct(Product $product)
    {

        $basket =$this->basket;

        $requested_quantity = request('quantity');

        $existed_product = $basket->products()->where('id',$product->id)->first();

    	if($existed_product){

            $requested_quantity += $existed_product->pivot->quantity;

            $this->basket->products()->detach($product);

        }

        $this->basket->products()->attach($product,['quantity' => $requested_quantity]);


    	return redirect('/basket');

    }




    /************************************
    |   delete Product from The Basket  |
    ************************************/
    public function detachProduct(Product $product)
    {

        $this->basket->products()->detach($product);

        return redirect('/basket');

    }


 

    /*************************************
    | Confirming Purshase ,               |
    | create the Invoice and              |
    | Decrease the quantity of Product    |
    **************************************/
    public function confirmPurchase(Invoices $invoice)
    {

        $invoice = $invoice->create($this->basket);

        $this->basket->status = 'confirmed';

        foreach ($this->basket->products as $product) {

            $product->decreaseQuantity();
            
        }
        $this->basket->save();

        return redirect('/basket/invoice/'.$invoice->id);

    }



    /***********************
    |     show invoice     |
    ***********************/
    public function showInvoice(Invoice $invoice)
    {
        
        return view('baskets.invoice', compact('invoice'));
    }




    /***********************
    |   Cancel The Basket  |
    ***********************/
    public function cancelling()
    {
        
        $this->basket->status = 'cancelled';

        $this->basket->save();

        return redirect('/');

    }


    /***********************
    |   Delete The Basket  |
    ***********************/
    public function destroy()
    {

        $this->basket->delete();

        return redirect('/');

    }
}
