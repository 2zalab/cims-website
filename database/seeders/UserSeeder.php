<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@cims.cm'], // évite les doublons
            [
                'name' => 'Admin',
                'password' => bcrypt('password123'), // hash du mot de passe
            ]
        );
    }
}
