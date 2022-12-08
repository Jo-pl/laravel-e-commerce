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

        $products = Product::factory(12)->create();
    }
}
