<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
            // $this->call(UserSeeder::class);
            $this->call(CustomerSeeder::class);
            $this->call(ItemSeeder::class);
            
            $this->call(RoleSeeder::class);
            $this->call(AdminSeeder::class);
        // ]);
    }
}
