<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullname' => 'Rahmat Hidayatullah',
            'username' => 'rahmat123',
            'email' => 'rahmat@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'fullname' => 'Milim Nava',
            'username' => 'milim123',
            'email' => 'milim@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'member',
        ]);

        User::create([
            'fullname' => 'Vivy Diva',
            'username' => 'vivy123',
            'email' => 'vivy@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'fullname' => 'Kobayashi',
            'username' => 'kobayashi123',
            'email' => 'kobayashi@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        
        // User::factory(20)->create();
    }
}
