<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function show(Product $product)
    {

    	return view('products.show', compact('product'));

    }

    public function create()
    {
    	return view('products.addProduct');
    }

    public function store()
    {
    	
    	$this->validate(request(), [
    		
    		'discount_pct' => 'integer|between:0,100'

    	]);

        $product = new Product(request(['code', 'name', 'price', 'quantity', 'discount_pct']));

        $product->save();

        $product->categories()->attach(request('category'));

        return redirect('/');


    }

    public function update(Product $product)
    {
        
        return view('products.update', compact('product'));

    }

    public function confirmUpdate(Product $product)
    {
        
        $product->name = request('name');

        $product->code = request('code');

        $product->discount_pct = request('discount_pct');

        $product->price = request('price');

        $product->quantity = request('quantity');       

        $product->save();

        $product->categories()->detach();

        $product->categories()->attach(request('category'));

        return redirect('/');
    }


    public function destroy(Product $product)
    {
        
        $product->delete();

        return redirect('/');

    }
}
