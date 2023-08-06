<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Article;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Article::factory(30)->create();
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@leveluptek.com',
            'password' => Hash::make('levelup'),
            'role' => 'admin',
        ]);
        Product::factory()->create(['name' => 'Laptop', 'price' => 1350]);
        Product::factory()->create(['name' => 'Mouse', 'price' => 13.50]);
        Product::factory()->create(['name' => 'RAM 8GB DDR4', 'price' => 135]);
        Cart::factory()->create(['user_id' => 1]);
        CartItem::factory()->create(['cart_id' => 1, 'product_id' => 1, 'quantity' => 1]);
        CartItem::factory()->create(['cart_id' => 1, 'product_id' => 2, 'quantity' => 1]);
        CartItem::factory()->create(['cart_id' => 1, 'product_id' => 3, 'quantity' => 4]);
        
    }
}
