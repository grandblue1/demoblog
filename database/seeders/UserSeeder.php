<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $admin = [
            'name' => 'admin',
            'email' => 'admin@a.a',
            'password' => '12345678',
            'role' => 0,
        ];
        User::query()->create($admin);
        User::factory()
        ->count(20)
        ->create();
        
    }
}
