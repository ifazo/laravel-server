<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(["pending", "processing", "completed", "cancelled"]);

        return [
            "products" => json_encode([
                [
                    "product_id" => $this->faker->uuid(),
                    "quantity" => $this->faker->numberBetween(1, 5),
                    "price" => $this->faker->numberBetween(100, 1000),
                ],
                [
                    "product_id" => $this->faker->uuid(),
                    "quantity" => $this->faker->numberBetween(1, 5),
                    "price" => $this->faker->numberBetween(100, 1000),
                ],
            ]),
            "total_amount" => $this->faker->numberBetween(100, 1000),
            "status" => $status,
            "session_id" => $this->faker->uuid(),
            "user_id" => User::factory(),
        ];
    }
}
