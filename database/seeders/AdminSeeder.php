<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'ambalabu@gmail.com')->exists()) {
            User::create([
                'name' => 'Ambalabu',
                'email' => 'ambalabu@gmail.com',
                'password' => Hash::make('12121212'),
                'role' => 'admin',
            ]);
        }
    }
}
