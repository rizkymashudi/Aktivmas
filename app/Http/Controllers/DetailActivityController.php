<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityModel;

class DetailActivityController extends Controller
{
    public function index(){

        $activities = ActivityModel::all();

        return view('pages.Front-end.activitydetail')->with([
            'activities' => $activities
        ]);
    }
}
