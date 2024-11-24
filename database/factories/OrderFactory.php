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
        $status = $this->faker->randomElement(["pending", "processing", "completed"]);

        return [
            "user_id" => User::factory(),
            "status" => $status,
            "amount" => $this->faker->numberBetween(100, 1000),
            "payment_date" => $status === "completed" ? $this->faker->dateTime() : null,
        ];
    }
}
