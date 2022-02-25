<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinancialReportModel;
use App\Models\JumatModel;
use App\Models\ActivityModel;
use App\Models\AnnounceModel;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $saldoAkhir = FinancialReportModel::latest()->first();
        $totalDebet = FinancialReportModel::sum('debet');
        $totalKredit = FinancialReportModel::sum('credit');
        $reports     = FinancialReportModel::all();

        return view('pages.dashboard')->with([
            'saldoAkhir' => $saldoAkhir,
            'totalDebet' => $totalDebet,
            'totalKredit'=> $totalKredit,
            'reports'    => $reports
        ]);
    }
}
