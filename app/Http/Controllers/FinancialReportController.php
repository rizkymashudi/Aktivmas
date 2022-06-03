<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinancialReportModel;
use App\Requests\FinancialReportRequest;
use DB;
use Alert;
use PDF;

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
                'debet'         => 'required',
                'date'          => 'required'
            ]);

            $a = str_replace(",", "", $validated['debet']);
            $b = str_replace(".00", "", $a);
            $debet = (int)$b;
            $latestSaldo = DB::table('reports')->latest()->first();
            

            if($latestSaldo === null):
                
                FinancialReportModel::create([
                    'description'   => $validated['description'],
                    'debet'         => $debet,
                    'credit'        => 0,
                    'balance'       => $debet,
                    'date'          => $validated['date']
                ]);
                

            else:
                $balance = $latestSaldo->balance + $debet;
                FinancialReportModel::create([
                    'description'   => $validated['description'],
                    'debet'         => $debet,
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
                'kredit'         => 'required',
                'date'          => 'required'
            ]);

            $a = str_replace(",", "", $validated['kredit']);
            $b = str_replace(".00", "", $a);
            $kredit = (int)$b;
            $latestSaldo = DB::table('reports')->latest()->first();
 
            if($latestSaldo == null || $kredit > $latestSaldo->balance):

                Alert::error('Gagal', 'Kas keluar tidak bisa lebih dari saldo');
                return redirect()->route('report.index');

            else:

                $balance = $latestSaldo->balance - $kredit;
                FinancialReportModel::create([
                    'description'   => $validated['description'],
                    'debet'         => 0,
                    'credit'        => $kredit,
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

        if (array_key_exists("debet", $data)){

            $a = str_replace(",", "", $data['debet']);
            $b = str_replace(".00", "", $a);
            $debet = (int)$b;
            $kas->update(['debet' => $debet, 'balance' => $debet]);
            Alert::toast('data berhasil diubah', 'success');

        } else if (array_key_exists("kredit", $data)){

            $a = str_replace(",", "", $data['kredit']);
            $b = str_replace(".00", "", $a);
            $kredit = (int)$b;

            if($kas['credit'] != 0){
                $currentCredit = $kas['credit'];
                if($currentCredit > $kredit) {
                    $deficitCredit = $currentCredit - $kredit;
                    $balance = $kas['balance'] + $deficitCredit;
                    $kas->update(['credit' => $kredit, 'balance' => $balance]);

                    Alert::toast('data berhasil diubah', 'success');

                } else if($currentCredit < $kredit) {
                    $currentBalance = FinancialReportModel::all()->first();
                    
                    $resultBalance = $currentBalance->balance - $kredit;
                    $kas->update(['credit' => $kredit, 'balance' => $resultBalance]);

                    Alert::toast('data berhasil diubah', 'success');
                } else {
                    Alert::error('Gagal', 'Kas keluar tidak bisa lebih dari saldo');
                }
            } else {
                $kas->update(['credit' => $kredit, 'balance' => $kredit]);
                Alert::toast('data berhasil diubah', 'success');
            }
        }
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

    
    public function exportPDF(){
        $data = FinancialReportModel::select('*')->whereMonth('date', now()->month)->get();
        $lastBalance = FinancialReportModel::select('balance')->whereMonth('date', now()->month)->latest()->first();
    
        $pdf = \PDF::loadview('pages.report.kasreport', ['data' => $data, 'latestBalance' => $lastBalance]);
        $pdfname = now()->toDateString();

        return $pdf->download("Laporan-Kas-$pdfname.pdf");
    }
}
