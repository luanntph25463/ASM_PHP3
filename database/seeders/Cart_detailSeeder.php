<?php

namespace Database\Seeders;

use App\Models\Cart_detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Cart_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cart_detail::factory()->count(18)->create();
    }
}
