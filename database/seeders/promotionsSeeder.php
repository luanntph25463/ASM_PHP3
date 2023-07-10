<?php

namespace Database\Seeders;

use App\Models\promotions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class promotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        promotions::factory()->count(18)->create();

    }
}
