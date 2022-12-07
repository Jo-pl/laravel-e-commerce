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
        User::factory(5)->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => 'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        $products = Product::factory(5)->create();
        $orders = Order::factory(3)->create();
        
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
