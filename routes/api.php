<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InferenceController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function (Request $request) {
    return [
        "result" => "success"
    ];
});

Route::get('/inferences', [InferenceController::class, 'show']);
Route::get('/allInferences', [InferenceController::class, 'showAll']);
Route::get("/paginateInferences",[InferenceController::class,"paginateInferences"]);


Route::get("/allPotholes",[InferenceController::class,"getAllPotholes"]);

Route::post("/getInferencesWithMaxAndMin",[InferenceController::class,"getInferencesWithMaxAndMin"]);



Route::post("/register",[AuthController::class,"register"]);
Route::post("/login",[AuthController::class,"login"])->name("login");

Route::post("/logout",[AuthController::class,"logout"])->middleware('auth:sanctum');

Route::post('/addInference', [InferenceController::class, 'store'])->middleware('auth:sanctum');


Route::get("/me",[AuthController::class,"me"])->middleware('auth:sanctum');

Route::post("/upload",[InferenceController::class,"storeImage"])->middleware('auth:sanctum');



