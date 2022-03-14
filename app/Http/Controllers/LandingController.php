<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\FinancialReportModel;
use App\Models\JumatModel;
use App\Models\ActivityModel;
use DB;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // JADWAL SHOLAT
        // parameters
        $cityCode   = '0506'; // Batam
        $year       = now()->year;
        $month      = now()->month;
        $today      = now()->isoFormat('YYYY-MM-DD');
       
        $data = Http::get("https://api.myquran.com/v1/sholat/jadwal/$cityCode/$year/$month")->json();

        foreach ($data['data']['jadwal'] as $jadwal) {
            if($jadwal['date'] == $today){
                $jadwal;
                $todaySholat = $jadwal;
            }
        }

        //JADWAL JUMAT
        if(now()->dayOfWeek == 5):
            $jumat = JumatModel::orderBy('date', 'desc')->first();
        else:
            $jumat = JumatModel::first();
        endif;
             

        //ACTIVITY
        $todayActivity = ActivityModel::where('activity_date', '>=', $today)
                                        ->orderBy('activity_date', 'asc')->first();
    
        $incomingActivity = ActivityModel::take(5)
                                ->where('activity_date', '>=', $today)
                                ->orderBy('id', 'ASC')
                                ->get();



        // KAS REPORT
        $reports = FinancialReportModel::select('*')->whereMonth('date', now()->month)->get();

        return view('pages.Front-end.landing-page')->with([
            'todaySholat' => $todaySholat,
            'reports' => $reports,
            'todayActivity' => $todayActivity,
            'incomingActivity' => $incomingActivity,
            'jumat' => $jumat,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
