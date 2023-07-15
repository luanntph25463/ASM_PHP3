<?php

namespace Database\Seeders;

use App\Models\ImageDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageDetailSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ImageDetail::factory()->count(18)->create();

    }
}
