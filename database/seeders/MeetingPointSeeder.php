<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\MeetingPoint;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MeetingPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tourId = Tour::pluck('tour_id');
        $tourIdArray = $tourId->toArray();

        MeetingPoint::create([
            'meeting_point_name'=>'Indomart',
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MeetingPoint::create([
            'meeting_point_name'=>'Alfamart',
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MeetingPoint::create([
            'meeting_point_name'=>'SPBU',
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MeetingPoint::create([
            'meeting_point_name'=>'Dekat Lampu Merah',
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MeetingPoint::create([
            'meeting_point_name'=>'Depan Rocket Chicken',
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        MeetingPoint::create([
            'meeting_point_name'=>'Masjid At-Taqwa',
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
