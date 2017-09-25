<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
   protected $guarded = [];

   public function scopeNewInvoice(Basket $basket)
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
