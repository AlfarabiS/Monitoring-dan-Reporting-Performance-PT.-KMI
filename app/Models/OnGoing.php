<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnGoing extends Model
{
    use HasFactory;

    // $onGoing = OnGoing::join('users','on_goings.NIK','=','users.NIK')
    //             ->join('warehouses','on_goings.gudang_id','=','warehouses.gudang_id')
    //             ->join('processes','on_goings.process_id','=','processes.process_id')
    //             ->get();
                
}
