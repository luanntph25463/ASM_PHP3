<?php

namespace Database\Seeders;

use App\Models\courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class coursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        courses::factory()->count(18)->create();

    }
}
