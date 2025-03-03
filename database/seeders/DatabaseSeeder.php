<?php

namespace Database\Seeders;

use App\Models\User;
// use App\Models\Profile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Koyasai',
            'email' => 'koyasai@mail.com',
            'password' => '12345678'
        ]);
        CompanyProfile::factory()->create();
    }
}
