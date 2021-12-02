<?php

use App\Http\Controllers\ModerationController;
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

// Moderation
Route::get('/moderation', [ModerationController::class, 'index'])->middleware('role:moderator');
Route::get('/moderation/salles', [ModerationController::class, 'offices'])->middleware('role:moderator');
Route::get('/moderation/salle-{office}', [ModerationController::class, 'office_view'])->middleware('role:moderator');
Route::get('/moderation/salle-{office}/delete', [ModerationController::class, 'office_delete'])->middleware('role:moderator');
Route::get('/moderation/salle-{office}/validate', [ModerationController::class, 'office_validate'])->middleware('role:moderator');
