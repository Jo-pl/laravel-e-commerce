<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(Product $product){
        $user = Auth::user();
        $existingOrder = Order::where('user_id','like', $user->id)->first();
        
        if($existingOrder){
            $existingOrder->total+=$product->price;
            $existingOrder->save();
            $existingOrder->products()->attach(
                $product->id
            );
            return redirect('/');
        }
        $order = new Order();
        $order->user_id = $user->id;
        $order->total = $product->price;
        $order->save();
        $order->products()->attach(
            $product->id
        );
        return redirect('/');
    }

    public function show(){
        $order = $this->getOrder();

        return view('orders.checkout',[
            'order'=>$order,
            'products'=>$order->products,
        ]);
    }

    public function update(Product $product,$orderID){
        $product->orders()->detach($orderID);
        return redirect()->back();
    }

    private function getOrder(){
        $user = Auth::user();
        return $user->orders->first();
    }
}
