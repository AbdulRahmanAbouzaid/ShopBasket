<?php

namespace App\Repositories;

use App\Invoice;
use App\Basket;


class Invoices{



/************************************
 ***    create The invoice     	  ***
 ************************************/

 public function create(Basket $basket)
 {
  
  $invoice = Invoice::create([

            'inv_number' => hexdec(uniqid()),

            'basket_id' => $basket->id,

            'inv_total' => $basket->totalActualPrice(),

            'inv_discount' => $basket->discountPercentage(),

            'inv_net' => $basket->totalNetPrice()

        ]);

        return $invoice;

 }

}