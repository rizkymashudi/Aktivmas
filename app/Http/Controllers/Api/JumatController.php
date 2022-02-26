<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JumatModel;
use Illuminate\Http\Request;

class JumatController extends Controller
{
    public function GetAll(){
        $khotbah = JumatModel::all();

        if(!$khotbah->isEmpty()):
            return ResponseFormatter::success($khotbah, 'Data khotbah jumat berhasil diambil');
        else:
            return ResponseFormatter::error(null, 'Data khotbah jumat tidak ada', 404);
        endif;
    }
}
