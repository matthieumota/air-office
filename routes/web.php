<?php

use App\Http\Controllers\OfficeController;
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

Route::get('/bureaux', [OfficeController::class, 'index'])->middleware('auth');
Route::get('/bureau/nouveau', [OfficeController::class, 'create'])->middleware('auth');
Route::post('/bureau/nouveau', [OfficeController::class, 'store'])->middleware('auth');
Route::get('/bureau/{office}', [OfficeController::class, 'show'])->middleware('auth');
