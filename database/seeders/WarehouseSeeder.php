<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')->insert([
            'gudang_id'=>'FG',
            'gudang_name'=>'Finish Good'
        ]);
        DB::table('warehouses')->insert([
            'gudang_id'=>'RM',
            'gudang_name'=>'Raw Material'
        ]);
        DB::table('warehouses')->insert([
            'gudang_id'=>'PM',
            'gudang_name'=>'Packaging Material'
        ]);
    }
}
