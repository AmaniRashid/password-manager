<?php

use App\Http\Controllers\GeneratorController;
use App\Http\Controllers\PasswordController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//call to password generator
Route::get('/generate', [GeneratorController::class,'index']);

Route::resource('password', PasswordController::class);
Route::get('/password/search/{website}', [PasswordController::class, 'search']);
