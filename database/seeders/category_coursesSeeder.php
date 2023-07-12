<?php

namespace Database\Seeders;

use App\Models\category_courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class category_coursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        category_courses::factory()->count(18)->create();
    }
}
