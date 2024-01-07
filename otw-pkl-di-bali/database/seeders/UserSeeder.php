<?php

namespace Database\Seeders;

use App\models\user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Kenzi Badrika',
            'email' => 'Kenadmin@gmail.com',
            'password' => Hash::make('kenzi'),
            'role' => 'Pembimbing Siswa',
        ]);
    }
}
