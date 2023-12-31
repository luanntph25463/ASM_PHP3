<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([category_coursesSeeder::class,teachersSeeder::class,UserSeeder::class,bannersSeeder::class,reviewsSeeder::class
    ,classesSeeder::class,promotionsSeeder::class,coursesSeeder::class,cartsSeeder::class,ImageDetailSeed::class,Cart_detailSeeder::class]);

    }
}
