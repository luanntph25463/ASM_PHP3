<?php

namespace Database\Seeders;

use App\Models\teachers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class teachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        teachers::factory()->count(18)->create();

    }
}
