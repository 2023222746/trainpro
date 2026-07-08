<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin
        User::create([
            'name' => 'Admin TrainPro',
            'email' => 'admin@trainpro.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create default owner
        User::create([
            'name' => 'Owner TrainPro',
            'email' => 'owner@trainpro.com',
            'password' => Hash::make('password'),
            'role' => 'owner',
        ]);

        // Create default trainer (Coach TAF)
        User::create([
            'name' => 'Coach TAF',
            'email' => 'coachtaf@trainpro.com',
            'password' => Hash::make('password'),
            'role' => 'trainer',
        ]);

        // Create a sample participant
        User::create([
            'name' => 'Ahmad Faisal',
            'email' => 'ahmad@example.com',
            'password' => Hash::make('password'),
            'role' => 'participant',
        ]);

        // Create extra random users (optional)
        // Uncomment to generate 10 random users with various roles
        // \App\Models\User::factory(10)->create();
    }
}
