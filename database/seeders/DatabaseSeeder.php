<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Tag::create([
            'name' => 'Kế hoạch 01',
            'slug' => 'ke-hoach-01'
        ]);
        Tag::create([
            'name' => 'Kế hoạch 02',
            'slug' => 'ke-hoach-02'
        ]);
    }
}
