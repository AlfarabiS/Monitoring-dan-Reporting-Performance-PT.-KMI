<?php

namespace App\Models;

use App\Models\OnGoing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kyslik\ColumnSortable\Sortable;

class OnGoing extends Model
{
    use HasFactory;
    use Sortable;

    protected $guarded = [
        'id'
    ];

    public $Sortable = [ ];

    public function nameSortable($query, $direction){
        
        return $query
                ->rightjoin('users','users.NIK','=','on_goings.NIK')
                ->leftjoin('warehouses','on_goings.gudang_id','=','warehouses.gudang_id')
                ->leftjoin('processes','processes.process_id','=','on_goings.process_id')
                ->where('logged_in',true)
                ->where('is_admin',false)
                ->orWhere('active',true)
                ->orderBy('name',$direction)
                ->select();
    
    }
    
    public function lokasiSortable($query, $direction){
        
        return $query
                ->rightjoin('users','users.NIK','=','on_goings.NIK')
                ->leftjoin('warehouses','on_goings.gudang_id','=','warehouses.gudang_id')
                ->leftjoin('processes','processes.process_id','=','on_goings.process_id')
                ->where('logged_in',true)
                ->where('is_admin',false)
                ->orWhere('active',true)
                ->orderBy('gudang_name',$direction)
                ->select();
    
    }
    
    public function statusSortable($query, $direction){
        
        return $query
                ->rightjoin('users','users.NIK','=','on_goings.NIK')
                ->leftjoin('warehouses','on_goings.gudang_id','=','warehouses.gudang_id')
                ->leftjoin('processes','processes.process_id','=','on_goings.process_id')
                ->where('logged_in',true)
                ->where('is_admin',false)
                ->orWhere('active',true)
                ->orderBy('process_name',$direction)
                ->select();
    
    }
    
                
}
