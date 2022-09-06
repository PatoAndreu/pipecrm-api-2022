<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactStatusController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\PipelineStageController;
use App\Http\Controllers\UserController;
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

Route::apiResource('/contacts', ContactController::class);
Route::apiResource('/contact/status', ContactStatusController::class);
Route::apiResource('/users', UserController::class);
Route::apiResource('/deals', DealController::class);
Route::apiResource('/pipelines', PipelineController::class);
Route::apiResource('/stages', PipelineStageController::class);
