<?php

use App\Http\Controllers\Api\AuthenticationController;
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

Route::prefix('v1')->group(function (){
   Route::post('/login', [AuthenticationController::class, 'login'])->name('v1.auth.login');

   Route::middleware('auth:sanctum')->group(function (){
      Route::post('/logout', [AuthenticationController::class, 'logout'])->name('v1.auth.logout');
   });
});
