<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
        User::insert([
            [
                'NIP' => 1234,
                'nama' => 'DONI',
                'password' => Hash::make('123456')
            ],
            [
                'NIP' => 1235,
                'nama' => 'DONO',
                'password' => Hash::make('123456')
            ],
            [
                'NIP' => 1236,
                'nama' => 'DONA',
                'password' => Hash::make('123456')
            ],
        ]);
        Role::insert([
            [
                'user_id' => 1,
                'jabatan' => 'DIREKTUR'
            ],
            [
                'user_id' => 2,
                'jabatan' => 'FINANCE'
            ],
            [
                'user_id' => 3,
                'jabatan' => 'STAFF'
            ]
        ]);
    }
}
