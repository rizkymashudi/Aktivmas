<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Auth::routes();

Route::resource('activities', ActivityController::class);
Route::resource('announcements', AnnouncementsController::class);
Route::resource('jumat', JumatController::class);
Route::resource('report', FinancialReportController::class);
