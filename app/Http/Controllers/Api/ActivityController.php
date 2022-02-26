<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActivityModel;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function GetAll(){
        $activities = ActivityModel::all();

        if(!$activities->isEmpty()):
            return ResponseFormatter::success($activities, 'Data kegiatan berhasil diambil');
        else:
            return ResponseFormatter::error(null, 'Data kegiatan tidak ada', 404);
        endif;
    }
}
