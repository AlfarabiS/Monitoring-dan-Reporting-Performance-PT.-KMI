<?php

namespace Database\Seeders;

use App\Models\Process;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Process::factory(10)->create();
        DB::table('processes')->insert([
            'process_name'=> 'Proses FG 1',
            'gudang_id'=> 'FG'
        ]);
        DB::table('processes')->insert([
            'process_name'=> 'Proses RM 2',
            'gudang_id'=> 'RM'
        ]);
        DB::table('processes')->insert([
            'process_name'=> 'Proses PM 3',
            'gudang_id'=> 'PM'
        ]);

    }
}
