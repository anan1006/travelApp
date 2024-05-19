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
            'price' => 1500000.00,
            'tour_guide_id' => $tourGuide1,
            'start_date' => Carbon::parse('2024-06-01'),
            'end_date' => Carbon::parse('2024-06-07'),
            'duration' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Tour::create([
            'title' => 'Semeru Tour',
            'description' => 'Enjoy a wonderful tour at Gunung Semeru',
            'price' => 750000.00,
            'tour_guide_id' => $tourGuide2,
            'start_date' => Carbon::parse('2024-06-01'),
            'end_date' => Carbon::parse('2024-06-06'),
            'duration' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Tour::create([
            'title' => 'Bromo Family Tour',
            'description' => 'Ke Bromo murah meriah enak',
            'price' => 350000.00,
            'tour_guide_id' => $tourGuide3,
            'start_date' => Carbon::parse('2024-06-01'),
            'end_date' => Carbon::parse('2024-06-03'),
            'duration' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
