<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware([
    'api',
    \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
    \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
    Route::post('/award-xp', [\App\Http\Controllers\XpEntryController::class, 'store']);

    Route::get('/leaderboard', [\App\Http\Controllers\LeaderboardController::class, 'index']);

});
