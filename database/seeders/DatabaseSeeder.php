<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@tienda.test'],
            [
                'name' => 'Admin Tienda',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        $this->call([
            AndroidDataSeeder::class,
        ]);
    }
}
