<?php

namespace Database\Seeders;

use App\Models\reviews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class reviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        reviews::factory()->count(18)->create();

    }
}
