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
        // Process::create([
        //     'process_name'=> 'Idle',
        //     'process_id'=> 'Idle',
        //     'gudang_id'=> ''
        // ]);

        // Process::Create([
        //     'process_name'=> 'Hold',
        //     'process_id'=> 'Hold',
        //     'gudang_id'=> ''
        // ]);
        
        Process::Create([
            'process_name'=> 'Lain-lain',
            'process_id'=> 'LL',
            'gudang_id'=> ''
        ]);

    }
}
