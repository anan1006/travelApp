<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourSchedule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TourScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tourId = Tour::pluck('tour_id');
        $tourIdArray = $tourId->toArray();

        TourSchedule::create([
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'activity' => 'Pemandian Mata Air Panas',
            'schedule_time' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TourSchedule::create([
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'activity' => 'Visit Museum',
            'schedule_time' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TourSchedule::create([
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'activity' => 'ishoma',
            'schedule_time' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        TourSchedule::create([
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'activity' => 'makan',
            'schedule_time' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
