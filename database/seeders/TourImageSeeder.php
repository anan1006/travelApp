<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TourImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tourId = Tour::pluck('tour_id');
        $tourIdArray = $tourId->toArray();

        TourImage::create([
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'image_url' => '/img/img1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TourImage::create([
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'image_url' => '/img/img1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TourImage::create([
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'image_url' => '/img/img1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TourImage::create([
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'image_url' => '/img/img1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
