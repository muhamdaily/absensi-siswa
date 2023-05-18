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
            'username' => 'FACHRUDIN MUHTAR',
            'password' => bcrypt('MentariTeknologi'),
            'role' => 'Guru',
        ]);

        User::factory()->create([
            'username' => 'MUHAMMAD MAURIBI',
            'password' => bcrypt('MentariTeknologi'),
            'role' => 'Guru',
        ]);

        User::factory()->create([
            'username' => 'ACHMAD ALI WAFA',
            'password' => bcrypt('MentariTeknologi'),
            'role' => 'Wali Murid',
        ]);

        User::factory()->create([
            'username' => 'INDRA SAPUTRA',
            'password' => bcrypt('MentariTeknologi'),
            'role' => 'Wali Murid',
        ]);
    }
}
