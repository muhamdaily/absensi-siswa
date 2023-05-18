<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'username' => 'Muhammad Mauribi',
            'password' => bcrypt('MuhamPedia'),
            'role' => 'Guru',
        ]);

        User::factory()->create([
            'username' => 'Fransisco Reyhan',
            'password' => bcrypt('MuhamPedia'),
            'role' => 'Guru',
        ]);

        User::factory()->create([
            'username' => 'ACHMAD ALI WAFA',
            'password' => bcrypt('MuhamPedia'),
            'role' => 'Wali Murid',
        ]);
    }
}
