<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\DetailActivityController;
use App\Http\Controllers\FinancialReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landingpage');
Route::get('donate', [DonateController::class, 'index'])->name('donate');
Route::get('announcement', [PengumumanController::class, 'index'])->name('announcement');
Route::get('activities-detail', [DetailActivityController::class, 'index'])->name('activities-detail');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


Auth::routes();
Route::resource('activities', 'ActivityController');
Route::resource('announcements', 'AnnouncementsController');
Route::resource('jumat', 'JumatController');
Route::resource('report', 'FinancialReportController');

Route::get('exportPDF', [FinancialReportController::class, 'exportPDF'])->name('export-PDF');
