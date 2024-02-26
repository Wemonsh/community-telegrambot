<?php

use App\Models\OfficeVisit;
use App\Models\TelegramUser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Http\Controllers\HomeController::class);

Route::get('/leaderboard', ['App\Http\Controllers\LeaderBoardController', 'index']);

