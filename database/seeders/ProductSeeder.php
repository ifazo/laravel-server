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
        ->hasReviews(5)
        ->create();

        Product::factory()
        ->count(10)
        ->hasReviews(2)
        ->create();

        Product::factory()
        ->count(10)
        ->create();
    }
}
