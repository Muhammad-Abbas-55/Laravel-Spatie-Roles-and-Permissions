<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Abbas Alvi',
            'email' => 'alvi@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('alvialvi'),  // Make sure to hash the adminadmin
        ]);
        
        $user->assignRole(['writer','admin']);
    }
}
