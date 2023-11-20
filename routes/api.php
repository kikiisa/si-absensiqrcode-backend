<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaturanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('v1/informasi',[PengaturanController::class,'api_informasi']);
Route::resource('v1/absensi',ApiController::class);
Route::post('v1/auth',[AuthController::class,'loginNip']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
