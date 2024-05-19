<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\Destination;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tourId = Tour::pluck('tour_id');
        $tourIdArray = $tourId->toArray();

        Destination::create([
            'destination_name'=>'rumah makan',
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Destination::create([
            'destination_name'=>'pantai pandawa',
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Destination::create([
            'destination_name'=>'bukit teletabis',
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Destination::create([
            'destination_name'=>'kawah ijen',
            'tour_id'=>$tourIdArray[rand(0,count($tourIdArray)-1)],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
