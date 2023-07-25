<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Club::create(['name' => 'Persib']);
        Club::create(['name' => 'Persija']);
        Club::create(['name' => 'Persikabo']);
        Club::create(['name' => 'PSM']);
    }
}
