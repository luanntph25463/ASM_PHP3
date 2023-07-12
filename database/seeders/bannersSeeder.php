<?php

namespace Database\Seeders;

use App\Models\banners;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        banners::factory()->count(18)->create();

    }
}
