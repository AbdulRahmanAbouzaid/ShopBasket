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
    		
    		'discount_pct' => 'integer|between:1,100'

    	]);


    }
}
