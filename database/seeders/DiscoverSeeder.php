<?php

namespace Database\Seeders;

use App\Models\Discover;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discover::create([
            'discover_title'=>'Bromo Tengger Semeru',
            'discover_location'=>'Pasuruan, Jawa Timur',
            'discover_image'=>"discover/discover1.png",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Discover::create([
            'discover_title'=>'Discover 2',
            'discover_location'=>'Jombang, Jawa Timur',
            'discover_image'=>"discover/discover2.png",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Discover::create([
            'discover_title'=>'Discover 3',
            'discover_location'=>'Surabaya, Jawa Timur',
            'discover_image'=>"discover/discover3.png",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Discover::create([
            'discover_title'=>'Discover 4',
            'discover_location'=>'Malang, Jawa Timur',
            'discover_image'=>"discover/discover4.png",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
