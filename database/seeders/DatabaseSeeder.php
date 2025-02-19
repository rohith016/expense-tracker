<?php

namespace Database\Seeders;

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
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ];

        $userExist = User::where('email',$userData['email'])->exists();
        if (!$userExist) {
            User::factory()->create($userData);
        }


        $this->call([
            CategorySeeder::class,
        ]);
    }
}
