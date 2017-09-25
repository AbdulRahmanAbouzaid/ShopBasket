<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password','is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function baskets()
    {

        return $this->hasMany(Basket::class);

    }


    public function getCurrentBasket()
    {
        //$this->baskets()->where('status','hangin')

        $basket = $this->baskets()
                       ->where('status','hanging')
                       ->first();

        //if exist return it , else Create new One
        if(!$basket){
            
            $newBasket = new Basket([
                
                'number' => 4,
                'status' => 'hanging'

            ]);

            $basket = $this->baskets()->save($newBasket);

        }
            
        return $basket;
    }

}
