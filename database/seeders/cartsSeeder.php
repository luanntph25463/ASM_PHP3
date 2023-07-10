<?php

namespace Database\Seeders;

use App\Models\carts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        carts::factory()->count(18)->create();

    }
}
