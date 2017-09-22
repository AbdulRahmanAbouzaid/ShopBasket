<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function getCategories(){

    	$ctgrs = Category::all();

    	return view('categories.allCategories', compact('ctgrs'));

    }

    public function viewCategory(Category $category)
    {
    
    	$category_products = $category->products;
    	
    	return view('categories.viewCategory', compact(['category','category_products']));

    }

    public function create()
    {

    	return view('categories.newCategory');

    }


}
