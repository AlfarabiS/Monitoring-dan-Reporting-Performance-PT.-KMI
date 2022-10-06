<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use \App\Models\Satuan;
use \App\Models\on_going;

class SatuanSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::factory(10)->create();
        
        Satuan::create([
            'satuan' => 'Pallete'
        ]);

        Satuan::create([
            'satuan' => 'Batch'
        ]);

    }
}
