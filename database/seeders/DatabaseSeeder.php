<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test',
            'image' => 'test.img',
            'email' => 'test@mail.com',
            'password' => bcrypt('123456'),
            'role' => 'buyer',
        ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
