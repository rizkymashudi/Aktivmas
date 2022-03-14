<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnounceModel;

class PengumumanController extends Controller
{
    public function index(){

        //PENGUMUMAN
        $announcements = AnnounceModel::orderBy('created_at', 'desc')->get();   

        return view('pages.Front-end.announcements')->with([
            'announcements' => $announcements
        ]);
    }
}
