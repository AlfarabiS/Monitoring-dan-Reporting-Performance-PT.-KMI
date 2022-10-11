<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Exports\ReportsExport;
use Illuminate\Support\Facades\DB;
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
        
        if (is_null($request->name ) && is_null($request->start_date) && is_null($request->end_date) ){

            $Report = Report::sortable('date')->paginate(15);    
        }else{
            $Report = Report::sortable('date')
                    ->where('name','like','%'.$nameFilter.'%')
                    ->whereBetween(DB::raw('date(reports_time)'),[$start->format('y-m-d H:i:s'),$end->format('y-m-d H:i:s')])
                    ->paginate(15);
        }

        return view('/admin/report',[
            'ActiveUser' => Auth::user()->name,
            'judul'=>'Report',
            'Users'=> User::where('is_admin','false')->get(),
            'date_start' => $request->start_date,
            'date_end' =>  $request->end_date,
            'name' => $nameFilter,
        ])->with('Report',$Report);
    }

    public function exportReport(Request $request){

        $name = $request->name;
        $start = $request->date_start;
        $end = $request->date_end;

        // dd($request->date_start);
        if($name){
            return (new ReportsExport($name, $start, $end))->download('Report '.$name.' '.$start.' - '.$end.'.xlsx');
        }
            return (new ReportsExport($name, $start, $end))->download('Reports '.$start.' - '.$end.'.xlsx');
            
        }
}
