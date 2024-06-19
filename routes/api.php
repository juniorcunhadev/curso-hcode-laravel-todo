<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationsController;

Route::post('/authentication/create', [AuthenticationsController::class, 'create']);

Route::get('/authentication/show', [AuthenticationsController::class, 'show'])
    ->middleware('auth:sanctum');

Route::post('/authentication/destroy', [AuthenticationsController::class, 'destroy'])
    ->middleware('auth:sanctum');

Route::get("tasks", "\App\Http\Controllers\TasksController@index")
    ->middleware('auth:sanctum');

Route::get("tasks/{task}", "\App\Http\Controllers\TasksController@show")
    ->middleware('auth:sanctum');

Route::post("tasks", "\App\Http\Controllers\TasksController@store")
    ->middleware('auth:sanctum');

Route::patch("tasks/{task}", "\App\Http\Controllers\TasksController@update")
    ->middleware('auth:sanctum');

Route::delete("tasks/{task}", "\App\Http\Controllers\TasksController@destroy")
    ->middleware('auth:sanctum');
