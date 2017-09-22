<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    public function products(){

    	return $this->belongsToMany(Product::class);
    }

    public function getRouteKeyName()
    {

    	return 'name';

    }

    public function isEmpty()
    {
    
    	return !$this->products->count() ? true : false;
    	
    }

}
