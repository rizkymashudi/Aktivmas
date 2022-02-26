<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FinancialReportModel;
use Illuminate\Http\Request;

class KasReportController extends Controller
{
    public function all(){
        $reports = FinancialReportModel::all();

        if(!$reports->isEmpty()):
            return ResponseFormatter::success($reports, 'Data kas berhasil diambil');
        else:
            return ResponseFormatter::error(null, 'Data kas tidak ada', 404);
        endif;
    }
}
