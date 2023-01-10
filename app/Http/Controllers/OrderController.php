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
        $existingOrder = Order::where('user_id','like', $user->id)->where('status',1)->first();
        if($existingOrder){
            $this->addProduct($existingOrder,$product);
            return redirect()->back();
        }
        $order = new Order();
        $order->status = 1;
        $order->user_id = $user->id;
        $order->total = $product->price;
        $order->save();
        $order->products()->attach($product->id,array('quantity'=>1));
        return redirect()->back();
    }

    private function addProduct($existingOrder,$product){
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
    }

    public function search(){
        if(Auth::user()->email=="admin@admin"){
            $orders = Order::latest()->filter(request(['search']))->get();
            $orders = $orders->map(function($order){
                $order->products = $order->products->map(function($product) use($order){
                    $product->quantity = OrderProduct::getQuantity($order->id,$product->id);
                    return $product;
                });
                return $order;
            });
            return view('orders.index',[
                'orders'=> $orders
            ]);
        }else{
            $orders = Order::latest()->where('user_id',Auth::user()->id)->where('status',2)->filter(request(['search']))->get();
            $orders = $orders->map(function($order){
                $order->products = $order->products->map(function($product) use($order){
                    $product->quantity = OrderProduct::getQuantity($order->id,$product->id);
                    return $product;
                });
                return $order;
            });
            return view('orders.index',[
                'orders'=> $orders
            ]);
        }
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

    public function update(Request $request){
        $order = json_decode($request->all()['order']);
        $oldOrder = Order::where('id',$order->id)->get()->first();
        //Add and remove features
        if(isset($order->products)){
            foreach($order->products as $product){
                if($product->quantity>0){
                    $oldOrder->products()->syncWithoutDetaching([
                        $product->id => [
                            'quantity' => $product->quantity
                        ]
                    ]);
                }else{
                    $oldOrder->products()->detach($product->id);
                    //destroy order if it doesn't contain any products
                    if($oldOrder->products()->count()==0){
                        $oldOrder->delete();
                        return redirect('/');
                    }
                }
            }
        }
        //Other params
        $oldOrder->total = $order->total;
        $oldOrder->status = $order->status;
        $oldOrder->save();
        //Check routes for redirect and total tax 
        if($request->path()=="checkout"){
            $oldOrder->total = ($order->total*1.15);
            $oldOrder->save();
            return redirect('/')->with('success','Thank you, we will be in touch shortly');
        }else{
            return redirect()->back()->with('success','Order updated');
        }
    }

    public function index(){
        if(Auth::user()->email=="admin@admin"){
            $orders = Order::all();
            $orders = $orders->map(function($order){
                $order->products = $order->products->map(function($product) use($order){
                    $product->quantity = OrderProduct::getQuantity($order->id,$product->id);
                    return $product;
                });
                return $order;
            });
            return view('orders.index',[
                'orders'=> $orders
            ]);
        }else{
            $orders = Order::all()->where('user_id',Auth::user()->id)->where('status',2);
            $orders = $orders->map(function($order){
                $order->products = $order->products->map(function($product) use($order){
                    $product->quantity = OrderProduct::getQuantity($order->id,$product->id);
                    return $product;
                });
                return $order;
            });
            return view('orders.index',[
                'orders'=> $orders
            ]);
        }
    }

    public function destroy(Order $order){
        $order->delete();
        return redirect()->back()->with('success','Order cancelled');
    }

    private function getOrder(){
        $user = Auth::user();
        return $user->orders->where('status',1)->first();
    }
}
