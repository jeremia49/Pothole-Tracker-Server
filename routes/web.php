<?php

use App\Http\Controllers\WebController;
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

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', function () {
    return view('login');
})->name('loginweb');

Route::post('/login', [WebController::class,"login"]);
Route::get('/settinginference', [WebController::class,"settinginference"])->middleware('auth')->name('settinginference');
Route::get('/verifypothole', [WebController::class,"verifypothole"])->middleware('auth')->name('verifypothole');


Route::get('/maps', function () {
    return view('maps');
})->name('maps');

Route::get('/maps2', function () {
    return view('maps2');
});


// Route::post
