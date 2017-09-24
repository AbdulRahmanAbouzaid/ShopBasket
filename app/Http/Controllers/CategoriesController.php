<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{

    public function getCategories(){

    	$ctgrs = Category::has('products')->get();

    	return view('categories.allCategories', compact('ctgrs'));

    }

    public function viewCategory(Category $category)
    {
    
    	$category_products = $category->products;
    	
    	return view('categories.viewCategory', compact(['category','category_products']));

    }

    public function create()
    {
        
        if(!auth()->user()->is_admin){

            return redirect('/');

        }

    	return view('categories.newCategory');

    }

    public function store()
    {

        if(!auth()->user()->is_admin){

            return redirect('/');

        }

        $this->validate(request(), [
            
            'max_discount_pct' => 'numeric|between:1,100'

        ]);

        Category::create(request(['code', 'name', 'max_discount_pct']));

        return redirect('/categories');

    }


    public function update(Category $category)
    {

        if(!auth()->user()->is_admin){

            return redirect('/');

        }  
        
        return view('categories.update', compact('category'));
        
    }

    public function confirmUpdate(Category $category)
    {

        if(!auth()->user()->is_admin){

            return redirect('/');

        }
        
        $category->name = request('name');

        $category->code = request('code');

        $category->max_discount_pct = request('max_discount_pct');

        $category->save();

        return redirect('/categories');


    }


    // public function DeleteProduct($)
    // {
    //     $this->products()->detach($product)
    // }


    public function destroy(Category $category)
    {

        if(!auth()->user()->is_admin){

            return redirect('/');

        }
        
        $category->delete();

        return redirect('/categories');

    }

}
