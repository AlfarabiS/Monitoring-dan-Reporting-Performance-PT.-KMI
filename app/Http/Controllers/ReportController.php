<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Exports\ReportsExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $validated_request = $request->validate([
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date|before_or_equal:start_date',
        // ]);
         
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $nameFilter = $request->query('name');
        
        if (!empty($nameFilter || $start && $end)){
            $Report = Report::sortable('date')
                    ->where('name','like','%'.$nameFilter.'%')
                    ->Where(function($query) use ($start, $end){
                        $query
                        ->whereDate('reports_time','<=',$end->format('y-m-d'))
                        ->whereDate('reports_time','>=',$start->format('y-m-d'));         
                    })
                    ->get();
        }else{
            $Report = Report::sortable('date')->paginate(15);    
        }

        return view('/admin/report',[
            'ActiveUser' => Auth::user()->name,
            'judul'=>'Report',
            'Users'=> User::where('is_admin','false')->get(),
            'date_start' => $start->format('y-m-d'),
            'date_end' =>  $end->format('y-m-d'),
            'name' => $nameFilter,
        ])->with('Report',$Report);
    }

    public function exportReport(Request $request){

        $name = $request->name;
        $start = $request->date_start;
        $end = $request->date_end;

        // dd($name);
        if($name){
            return (new ReportsExport($name, $start, $end))->download('Report '.$name.' '.$start.' - '.$end.'.xlsx');
        }
        return (new ReportsExport($name, $start, $end))->download('Reports '.$start.' - '.$end.'.xlsx');
    
    }
}
