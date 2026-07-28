<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Michelle M',
            'nip' => '0000',
            'password' => Hash::make('testingweb'),
            'role' => 'superadmin',
        ]);

        // Demografi data has been removed as per your request so you can input it yourself.
    }
}