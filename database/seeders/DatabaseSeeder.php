<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'caab-doc@gmail.com',
            'password' => bcrypt('123456789'),
            'role_id' => 1,
        ]);
    }

}
