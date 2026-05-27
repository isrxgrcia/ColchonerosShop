<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@tienda.test'],
            [
                'name' => 'Admin Tienda',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );
        $this->call([
            WebDataSeeder::class,
        ]);
    }
}