<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        $products = Product::factory(8)->create();
        $orders = Order::factory(8)->create();
        
        Product::all()->each(function($product) use($orders){
            $product->orders()->attach(
                $orders->random(3)->pluck('id')->toArray()
            );
        });

        Order::all()->each(function($order) use($products){
            $order->products()->attach(
                $products->random(3)->pluck('id')->toArray()
            );
        });
    }
}
