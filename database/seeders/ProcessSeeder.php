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
            'process_name'=> 'Loading',
            'process_id'=> 'FG-Loading',
            'gudang_id'=> 'FG'
        ]);

    }
}
