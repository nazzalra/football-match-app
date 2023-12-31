<?php

use App\Http\Controllers\ClassementController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\MatchController;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::redirect('/', '/classement');

Route::get('/classement', ClassementController::class)->name('classement');

Route::get('clubs/create', [ClubController::class, 'create'])->name('clubs.create');

Route::get('matches/create', [MatchController::class, 'create'])->name('matches.create');
