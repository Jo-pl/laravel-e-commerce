<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Pivot
{
    public static function getQuantity($orderID,$productID){
        $orderProducts = OrderProduct::where('order_id','=',$orderID)->get();
        foreach($orderProducts as $op){
            if($op->product_id==$productID){
                return $op->quantity;
            } 
        }
        //ddd(
        //    'orderID: '. $orderID . ' productID: '. $productID . ' item: ' .$item->first()
        //);
        return 0;
    }
}