<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\TaskController;

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

Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/tasks/{id}', [TaskController::class, 'show']);

Route::put('/tasks/{task}', [TaskController::class, 'update']);

Route::post('/tasks', [TaskController::class, 'store']);

Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
