<?php

namespace Database\Seeders;

use App\Models\ContactFromLanding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactFromLandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactFromLanding::create([
            'name' => 'azizi shafa asadel',
            'email' => 'azizi@gmail.com',
            'messege' => 'Saya mau melakukan perjalanan ke bali dengan keluarga saya. Bisakah saya membuat rencana tour saya?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        ContactFromLanding::create([
            'name' => 'mutiara azzahra',
            'email' => 'mumuchang@gmail.com',
            'messege' => 'bisakah saya merencanakan perjalanan saya dan teman-teman saya ke jogjakarta?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        ContactFromLanding::create([
            'name' => 'fiony alveria tantri',
            'email' => 'cepio@gmail.com',
            'messege' => 'kak saya mau magang, apakah boleh?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
