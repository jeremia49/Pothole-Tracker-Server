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
Route::get('/verifypothole/{id}', [WebController::class,"setPotholeVerified"])->middleware('auth')->name('verifypotholewithid');
Route::get('/rejectpothole/{id}', [WebController::class,"setPotholeRejected"])->middleware('auth')->name('rejectpotholewithid');
Route::get('/adminmaps', [WebController::class,"adminmaps"])->middleware('auth')->name('adminmaps');
Route::get('/deleteinference', [WebController::class,"deleteinference"])->middleware('auth')->name('deleteinference');
Route::get('/deleteinference/{id}', [WebController::class,"deleteinference"])->middleware('auth')->name('deleteinferencewithid');
Route::get('/switchstatus', [WebController::class,"switchstatus"])->middleware('auth')->name('switchstatus');
Route::get('/switchstatus/{id}', [WebController::class,"switchstatus"])->middleware('auth')->name('switchstatuswithid');


Route::get('/maps', function () {
    return view('maps');
})->name('maps');

Route::get('/maps2', function () {
    return view('maps2');
});


// Route::post
