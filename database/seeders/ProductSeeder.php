<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()
        ->count(10)
        ->haeReviews(5)
        ->create();

        Product::factory()
        ->count(10)
        ->haeReviews(3)
        ->create();

        Product::factory()
        ->count(10)
        ->haeReviews(1)
        ->create();

        Product::factory()
            ->count(10)
            ->create();
    }
}
