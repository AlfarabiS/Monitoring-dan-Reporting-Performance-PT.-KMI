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
        
        User::create([
            'NIK' => '31209843',
            'name' => 'MUHAMAD ALFARABI SETIAWAN',
            'email' => 'alfarabis@gmail.com',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 1
        ]);

        User::create([
            'NIK' => 'K210900228',
            'name' => 'ADE SUPRIATNO',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => 'K200500133',
            'name' => 'AHMAD HARISONNUDIN',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => 'K190500224',
            'name' => 'GHIFAR ANSYORI',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => 'K200400110',
            'name' => 'JAMALUDIN',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => 'K200500132',
            'name' => 'JEPI JAPARHADI',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => '210100017',
            'name' => 'MUHAMMAD ARDANI',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => '210100014',
            'name' => 'MUHAMMAD HENDRIK HERIAWAN',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => 'K210300089',
            'name' => 'MUHAMMAD RIZKI MUTAQIN',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => 'K200400111',
            'name' => 'YASIN FAOZI',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => '210100016',
            'name' => 'TEDI ALI AJIS',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => '210100018',
            'name' => 'IMAL MALURI',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 1
        ]);
        
        User::create([
            'NIK' => 'K211000238',
            'name' => 'DILI MUKLIS',
            'password' => Hash::make('password'),
            'gudang_id' => 'FG',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => 'K220300039',
            'name' => 'DENI KURNIA ALATAS',
            'password' => Hash::make('password'),
            'gudang_id' => 'RM',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => 'K211200254',
            'name' => 'TOPAN MUHAMMAD FATAH',
            'password' => Hash::make('password'),
            'gudang_id' => 'RM',
            'is_admin' => 0
        ]);
        
        User::create([
            'NIK' => '180100027',
            'name' => 'HERMANSYAH',
            'password' => Hash::make('password'),
            'gudang_id' => 'RM',
            'is_admin' => 0
        ]);
    }
}
