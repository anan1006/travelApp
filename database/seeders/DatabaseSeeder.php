<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            ContactFromLandingSeeder::class,
            TourGuideSeeder::class,
            TourSeeder::class,
            MeetingPointSeeder::class,
            TourScheduleSeeder::class,
            TourImageSeeder::class,
            DestinationSeeder::class,
            DiscoverSeeder::class,
        ]);
    }
}
