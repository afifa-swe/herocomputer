<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/services', [DataController::class, 'services']);
Route::get('/cases', [DataController::class, 'cases']);
Route::get('/dev-tasks', [DataController::class, 'devTasks']);

Route::post('/contact/project', [ContactController::class, 'submitProject']);
Route::post('/contact/developer', [ContactController::class, 'submitDeveloper']);
