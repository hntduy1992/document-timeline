<?php

namespace Database\Seeders;

use App\Models\DonVi;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'ho_ten' => 'Administrator',
            'is_admin' => true,
            'id_don_vi' => 0
        ]);
        User::create([
            'username' => 'test',
            'password' => Hash::make('test'),
            'ho_ten' => 'Test User',
            'is_admin' => false,
            'id_don_vi' => 0
        ]);

        DonVi::create([
            'ten_don_vi' => fake()->name,
            'logo' => fake()->url
        ]);
        DonVi::create([
            'ten_don_vi' => fake()->name,
            'logo' => fake()->url
        ]);
        DonVi::create([
            'ten_don_vi' => fake()->name,
            'logo' => fake()->url
        ]);
        DonVi::create([
            'ten_don_vi' => fake()->name,
            'logo' => fake()->url
        ]);
    }
}
