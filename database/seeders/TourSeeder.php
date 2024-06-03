<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Tour;
use App\Models\TourGuide;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil UUID dari tour guides yang ada
        $tourGuide1 = TourGuide::where('email', 'manto@gmail.com')->first()->tour_guide_id;
        $tourGuide2 = TourGuide::where('email', 'joko@gmail.com')->first()->tour_guide_id;
        $tourGuide3 = TourGuide::where('email', 'tejo@gmail.com')->first()->tour_guide_id;

        Tour::create([
            'title' => 'Bali Family Tour',
            'description' => 'Enjoy a wonderful family vacation in Bali with guided tours and activities.',
            'max_participant'=>12,
            'price' => 1500000.00,
            'tour_guide_id' => $tourGuide1,
            'banner_path'=>'bannerImg/hero3.jpg',
            'start_date' => Carbon::parse('2024-06-01'),
            'end_date' => Carbon::parse('2024-06-07'),
            'duration' => 7,
            'location'=>"Lokasi Tour Bali",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Tour::create([
            'title' => 'Semeru Tour',
            'description' => 'Enjoy a wonderful tour at Gunung Semeru',
            'max_participant'=>35,
            'price' => 750000.00,
            'tour_guide_id' => $tourGuide2,
            'banner_path'=>'bannerImg/hero3.jpg',
            'start_date' => Carbon::parse('2024-06-01'),
            'end_date' => Carbon::parse('2024-06-06'),
            'duration' => 6,
            'location'=>"Lokasi Tour Semeru",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Tour::create([
            'title' => 'Bromo Family Tour',
            'description' => 'Ke Bromo murah meriah enak',
            'max_participant'=>25,
            'price' => 350000.00,
            'tour_guide_id' => $tourGuide3,
            'banner_path'=>'bannerImg/hero3.jpg',
            'start_date' => Carbon::parse('2024-06-01'),
            'end_date' => Carbon::parse('2024-06-03'),
            'duration' => 3,
            'location'=>"Lokasi Tour Bromo",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
