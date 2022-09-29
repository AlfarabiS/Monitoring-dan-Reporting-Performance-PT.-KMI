<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
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
    public function index()
    {
        $Report = Report::sortable('date')->paginate(15);

            return view('/admin/report',[
                'ActiveUser' => Auth::user()->name,
                'judul'=>'Report',

                // 'Users'=> User::where('is_admin','false')->get(),
            ])->with('Report',$Report);
    }
}
