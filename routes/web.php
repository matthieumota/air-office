<?php

use App\Http\Controllers\ModerationController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/connexion', function () {
    Auth::loginUsingId(request('u', 1));

    return redirect('/bureaux');
})->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [RegisterController::class, 'register']);

// Bureaux
Route::get('/bureaux', [OfficeController::class, 'index'])->middleware('auth');
Route::get('/bureau/nouveau', [OfficeController::class, 'create'])->middleware('auth');
Route::post('/bureau/nouveau', [OfficeController::class, 'store'])->middleware('auth');
Route::get('/bureau/{office}', [OfficeController::class, 'show'])->middleware('auth');
Route::any('/bureau/modifier/{office}', [OfficeController::class, 'edit'])->middleware('auth');
Route::delete('/bureau/{office}', [OfficeController::class, 'destroy'])->middleware('auth');

Route::get('/reservations', [ReservationController::class, 'index'])->middleware('auth');
Route::post('/reservation/{office}', [ReservationController::class, 'store'])->middleware('auth');

// Moderation
Route::middleware(['middleware' => 'role:moderator'])->prefix('moderation')->group(function () {
    Route::get('/', [ModerationController::class, 'index']);
    Route::get('/salles', [ModerationController::class, 'offices']);

    Route::prefix('/salle-{office}')->group(function () {
        Route::get('/', [ModerationController::class, 'office_view']);
        Route::get('/delete', [ModerationController::class, 'office_delete']);
        Route::get('/validate', [ModerationController::class, 'office_validate']);
    });
});
