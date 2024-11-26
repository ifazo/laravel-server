<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->hasOrders(10)
            ->create();

        User::factory()
            ->count(10)
            ->hasOrders(5)
            ->create();

        User::factory()
            ->count(10)
            ->create();

        User::factory()
            ->count(10)
            ->hasReviews(5)
            ->create();

        User::factory()
            ->count(10)
            ->hasReviews(3)
            ->create();

        User::factory()
            ->count(10)
            ->hasReviews(1)
            ->create();

        User::factory()
            ->count(10)
            ->create();
    }
}
