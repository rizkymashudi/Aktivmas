<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kas', 'Api\KasReportController@all');
Route::get('kegiatan', 'Api\ActivityController@GetAll');
Route::get('pengumuman', 'Api\AnnouncementsController@GetAll');
Route::get('khotbah', 'Api\JumatController@GetAll');