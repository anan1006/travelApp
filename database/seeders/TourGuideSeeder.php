<?php

namespace Database\Seeders;

use App\Models\TourGuide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TourGuide::create([
            'name' => 'sumanto',
            'email' => 'manto@gmail.com',
            'phone' => '085778350161',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TourGuide::create([
            'name' => 'joko',
            'email' => 'joko@gmail.com',
            'phone' => '085778350729',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TourGuide::create([
            'name' => 'tejo',
            'email' => 'tejo@gmail.com',
            'phone' => '085778358143',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
