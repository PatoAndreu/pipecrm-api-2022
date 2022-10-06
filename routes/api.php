<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactLifeCycleStageController;
use App\Http\Controllers\ContactStatusController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\PipelineStageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetingController;
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
Route::apiResource('/contact/stages', ContactLifeCycleStageController::class);
Route::apiResource('/users', UserController::class);
Route::apiResource('/deals', DealController::class);
Route::apiResource('/pipelines', PipelineController::class);
Route::apiResource('/stages', PipelineStageController::class);
Route::apiResource('/tasks', TaskController::class);
Route::apiResource('/notes', NoteController::class);
Route::apiResource('/companies', CompanyController::class);
Route::apiResource('/meetings', MeetingController::class);

Route::get('/tasks/contact/{contact}', 'App\Http\Controllers\TaskController@byContact');
Route::get('/notes/contact/{contact}', 'App\Http\Controllers\NoteController@byContact');
Route::get('/meetings/contact/{contact}', 'App\Http\Controllers\MeetingController@byContact');
Route::get('/deals/contact/{contact}', 'App\Http\Controllers\DealController@byContact');
Route::get('/contact/activity/{id}', 'App\Http\Controllers\ContactController@activity');

Route::get('/activity', 'App\Http\Controllers\ActivityController@index');
