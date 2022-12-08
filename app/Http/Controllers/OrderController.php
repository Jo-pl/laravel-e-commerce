<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(Product $product){
        //Need refactor since this is messy. Also need to move the update order parts out of this create order function
        $user = Auth::user();
        $existingOrder = Order::where('user_id','like', $user->id)->first();
        if($existingOrder){
            $existingOrder->total+=$product->price;
            $existingOrder->save();            
            $quantity = OrderProduct::getQuantity($existingOrder->id,$product->id);
            if($quantity==0){
                $existingOrder->products()->attach($product->id,array('quantity'=>1));
            }else{
                $existingOrder->products()->syncWithoutDetaching([
                    $product->id => [
                        'quantity' => $quantity+1
                    ]
                ]);
            }
            return redirect()->back();
        }
        $order = new Order();
        $order->user_id = $user->id;
        $order->total = $product->price;
        $order->save();
        $order->products()->attach($product->id,array('quantity'=>1));
        return redirect()->back();
    }

    public function show(){
        $order = $this->getOrder();
        $order->products = $order->products->map(function($product) use($order){
            $product->quantity = OrderProduct::getQuantity($order->id,$product->id);
            return $product;
        });
        return view('orders.show',[
            'order'=>$order,
            'products'=>$order->products,
        ]);
    }
    //Right now this function is only use for remove, the "add" functionnality is in create
    public function update(Order $order,Product $product){
        $order->total-= $product->price;
        $order->save(); 
        $quantity = OrderProduct::getQuantity($order->id,$product->id);
        //update price
        if($quantity==1){
            $order->products()->detach($product->id);
            //destroy order if it doesn't contain any products
            if($order->products()->count()==0){
                $order->delete();
                return redirect('/');
            }
        }else{
            $order->products()->syncWithoutDetaching([
                $product->id => [
                    'quantity' => $quantity-1
                ]
            ]);
        }
        return redirect()->back();
    }

    public function index(){
        return view('orders.index');
    }

    private function getOrder(){
        $user = Auth::user();
        return $user->orders->first();
    }
}
