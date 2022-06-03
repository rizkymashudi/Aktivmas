<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinancialReportModel;
use App\Requests\FinancialReportRequest;
use DB;
use Alert;

class FinancialReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = FinancialReportModel::all();
        return view('pages.report.index')->with([
            'reports' => $reports
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->kredit === null):
            $validated = $request->validate([
                'description'   => 'required',
                'debet'         => 'required|integer|min:1',
                'date'          => 'required'
            ]);

            $debet = (int)$validated['debet'];
            $latestSaldo = DB::table('reports')->latest()->first();
            

            if($latestSaldo === null):
                
                FinancialReportModel::create([
                    'description'   => $validated['description'],
                    'debet'         => $validated['debet'],
                    'credit'        => 0,
                    'balance'       => $validated['debet'],
                    'date'          => $validated['date']
                ]);
                

            else:
                $balance = $latestSaldo->balance + $debet;
                FinancialReportModel::create([
                    'description'   => $validated['description'],
                    'debet'         => $validated['debet'],
                    'credit'        => 0,
                    'balance'       => $balance,
                    'date'          => $validated['date']
                ]);

            endif;

            Alert::toast('Data berhasil ditambahkan', 'success');
            return redirect()->route('report.index');

        else:

            $validated = $request->validate([
                'description'   => 'required',
                'kredit'         => 'required|integer|min:1',
                'date'          => 'required'
            ]);

            $kredit = (int)$validated['kredit'];
            $latestSaldo = DB::table('reports')->latest()->first();
 
            if($latestSaldo == null || $kredit > $latestSaldo->balance):

                Alert::error('Gagal', 'Kas keluar tidak bisa lebih dari saldo');
                return redirect()->route('report.index');

            else:

                $balance = $latestSaldo->balance - $kredit;
                FinancialReportModel::create([
                    'description'   => $validated['description'],
                    'debet'         => 0,
                    'credit'        => $validated['kredit'],
                    'balance'       => $balance,
                    'date'          => $validated['date']
                ]);

                Alert::toast('Data berhasil ditambahkan', 'success');
                return redirect()->route('report.index');

            endif;
        endif;   

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
        $kas = FinancialReportModel::findOrFail($id);
        return view('pages.report.edit')->with([
            'kas' => $kas
        ]);
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
        $data = $request->all();
        $kas = FinancialReportModel::findOrFail($id);
        $kas->update(['debet' => $data['debet'], 'balance' => $data['debet']]);
        Alert::toast('Data berhasil diubah', 'success');
        
        return redirect()->route('report.index');
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
