<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "rating"=> $this-> faker->numberBetween(1, 5),
            "review"=> $this-> faker->text(),
            "user_id"=> Customer::factory(),
            "product_id"=> Product::factory(),
        ];
    }
}
