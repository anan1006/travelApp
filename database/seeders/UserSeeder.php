<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            'name' => 'Super Admin - Anandhari Alfitho',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $superadmin->assignRole('superadmin');

        $admin = User::create([
            'name' => 'Admin - Shani Indira',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User - Flora Shafiqa',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole('user');

        // for ($i=1; $i <= 15; $i++) {
        //     $user = User::create([
        //         'name' => 'Sumardi Bengkel '.$i,
        //         'username' => 'sumardi'.$i,
        //         'email' => 'mardibengkel'.$i.'@gmail.com',
        //         'password' => Hash::make('12345678'),
        //     ]);
        //     $user->assignRole('user');
        // }
    }
}
