<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use \App\Models\User;
use \App\Models\on_going;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::factory(10)->create();
        
        DB::table('users')->insert([
            'NIK' => Str::random(15),
            'name' => Str::random(10),
            'email' => 'alfarabis@gmail.com',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 1
        ]);
    }
}
