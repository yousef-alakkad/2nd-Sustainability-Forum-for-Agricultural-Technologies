<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExitController;
use App\Http\Controllers\Api\AttendController;
use App\Http\Controllers\Api\WorkShopController;
use App\Http\Controllers\Api\RegisteredController;

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

// Get Registered Info
Route::get('registered-info/{code}', [RegisteredController::class, 'getInfo']);

// Get All Workshops
//Route::get('workshops', [\App\Http\Controllers\Api\WorkShopController::class, 'allWorkshops']);

// Event Attend
Route::post('attend', [\App\Http\Controllers\Api\AttendController::class, 'attend']);
Route::post('attend-training', [\App\Http\Controllers\Api\AttendController::class, 'attendTraining']);

// Workshop Attend
//Route::post('workshop-attend', [\App\Http\Controllers\Api\AttendController::class, 'workshopAttend']);
