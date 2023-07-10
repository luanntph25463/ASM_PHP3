<?php

namespace Database\Seeders;

use App\Models\classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class classesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        classes::factory()->count(18)->create();

    }
}
