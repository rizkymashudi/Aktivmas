<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnnounceModel;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function GetAll(){
        $announcements = AnnounceModel::all();

        if(!$announcements->isEmpty()):
            return ResponseFormatter::success($announcements, 'Data pengumuman berhasil diambil');
        else:
            return ResponseFormatter::error(null, 'Data pengumuman tidak ada', 404);
        endif;
    }
}
