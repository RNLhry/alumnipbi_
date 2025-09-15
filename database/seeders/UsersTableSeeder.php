<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'nim' => '123456',
                'password' => Hash::make('password'),
                'roles_id' => 1, // Sesuaikan dengan ID roles yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ]
            ]);
    }
}
