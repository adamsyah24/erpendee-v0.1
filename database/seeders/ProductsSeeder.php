<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->count(3)
            ->sequence(fn ($sequence) => [
                'product_name' => 'Web Developer ' . $sequence->index + 1,
                'product_desc' => 'WEB' . $sequence->index + 1,
                'price' => '1200000',
            ])
            ->create();
    }
}
