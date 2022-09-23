<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Report extends Model
{
    use HasFactory;
    use Sortable;

    protected $guarded = [
        'id'
    ];

    public $sortable = [];

    public function gudangSortable($query, $direction)
    {
        return $query->join('warehouses','reports.gudang_id','=','warehouses.gudang_id')
        ->join('users','reports.NIK','=','users.NIK')
            ->join('processes','reports.process_id','=','processes.process_id')
            ->orderBy('gudang_name',  $direction)
            ->select();
    }
    public function nameSortable($query, $direction)
    {
        return $query->join('users','reports.NIK','=','users.NIK')
            ->join('warehouses','reports.gudang_id','=','warehouses.gudang_id')
            ->join('processes','reports.process_id','=','processes.process_id')
            ->orderBy('name',  $direction)
            ->select();
    }
    public function prosesSortable($query, $direction)
    {
        return $query
            ->join('processes','reports.process_id','=','processes.process_id')
            ->join('warehouses','reports.gudang_id','=','warehouses.gudang_id')
            ->join('users','reports.NIK','=','users.NIK')
            ->orderBy('process_name',  $direction)
            ->select();
    }
    public function performanceSortable($query, $direction)
    {
        return $query
            ->join('processes','reports.process_id','=','processes.process_id')
            ->join('warehouses','reports.gudang_id','=','warehouses.gudang_id')
            ->join('users','reports.NIK','=','users.NIK')
            ->orderBy('performance',  $direction)
            ->select();
    }
    public function dateSortable($query, $direction)
    {
        return $query
            ->join('processes','reports.process_id','=','processes.process_id')
            ->join('warehouses','reports.gudang_id','=','warehouses.gudang_id')
            ->join('users','reports.NIK','=','users.NIK')
            ->orderBy('reports_time',  $direction)
            ->select();
    }
}
