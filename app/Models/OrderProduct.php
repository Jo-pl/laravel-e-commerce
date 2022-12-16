<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Pivot
{
    public static function getQuantity($orderID,$productID){
        //ddd($orderID,$productID);
        $product = OrderProduct::where('order_id','=',$orderID)->where('product_id','=',$productID)->first();
        if($product){
            return $product->quantity;
        }
        return 0;
    }
}