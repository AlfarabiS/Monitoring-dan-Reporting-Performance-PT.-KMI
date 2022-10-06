<?php

namespace App\Exports;

use App\Models\Report;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportsExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct($name, $start, $end){
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;

        // dd($start);
    }

    public function query(){
        return Report::join('processes','reports.process_id','=','processes.process_id')
        ->join('warehouses','reports.gudang_id','=','warehouses.gudang_id')
        ->join('users','reports.NIK','=','users.NIK')
        ->where('name','like','%'.$this->name.'%')
        ->whereDate('reports_time','<=',$this->end)
        ->whereDate('reports_time','>=',$this->start)
        ->select('name','gudang_name','process_name','reports_time','work_time','qty','satuan','hold_time','performance','keterangan');
    }

    public function headings(): array
    {
        return [
            "Nama", 
            "Lokasi", 
            "Proses", 
            "Waktu",
            "Waktu Kerja",
            "Qty",
            "Satuan",
            "Hold Time" ,
            "Performa",
            "Keterangan"
        ];
    }
}
