<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\EnrolmentController;

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

Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentController::class, 'index']);
    Route::get('/{id}', [StudentController::class, 'show']);
    Route::post('/', [StudentController::class, 'store']);
    Route::put('/{id}', [StudentController::class, 'update']);
    Route::delete('/{id}', [StudentController::class, 'destroy']);
});

Route::group(['prefix' => 'lecturers'], function () {
    Route::get('/', [LecturerController::class, 'index']);
    Route::get('/{id}', [LecturerController::class, 'show']);
    Route::post('/', [LecturerController::class, 'store']);
    Route::put('/{id}', [LecturerController::class, 'update']);
    Route::delete('/{id}', [LecturerController::class, 'destroy']);
});

Route::group(['prefix' => 'modules'], function () {
    Route::get('/', [ModuleController::class, 'index']);
    Route::get('/{id}', [ModuleController::class, 'show']);
    Route::post('/', [ModuleController::class, 'store']);
    Route::put('/{id}', [ModuleController::class, 'update']);
    Route::delete('/{id}', [ModuleController::class, 'destroy']);
});

Route::group(['prefix' => 'enrolments'], function () {
    Route::get('/', [EnrolmentController::class, 'index']);
    Route::get('/{id}', [EnrolmentController::class, 'show']);
    Route::get('/module/{id}', [EnrolmentController::class, 'showModule']);
    Route::get('/{stid}/{mid}/{semester}', [EnrolmentController::class, 'showOneModule']);
    Route::post('/', [EnrolmentController::class, 'store']);
    Route::put('/{stid}/{mid}/{semester}', [EnrolmentController::class, 'update']);
    Route::delete('/{stid}/{mid}/{semester}', [EnrolmentController::class, 'destroy']);
   
});