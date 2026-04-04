<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\ContactRequestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DevTaskController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Services
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services');
    Route::get('/services/create', [ServiceController::class, 'create']);
    Route::post('/services', [ServiceController::class, 'store']);
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit']);
    Route::put('/services/{service}', [ServiceController::class, 'update']);
    Route::delete('/services/{service}', [ServiceController::class, 'destroy']);

    // Cases
    Route::get('/cases', [CaseStudyController::class, 'index'])->name('admin.cases');
    Route::get('/cases/create', [CaseStudyController::class, 'create']);
    Route::post('/cases', [CaseStudyController::class, 'store']);
    Route::get('/cases/{case}/edit', [CaseStudyController::class, 'edit']);
    Route::put('/cases/{case}', [CaseStudyController::class, 'update']);
    Route::delete('/cases/{case}', [CaseStudyController::class, 'destroy']);

    // Dev Tasks
    Route::get('/dev-tasks', [DevTaskController::class, 'index'])->name('admin.devtasks');
    Route::get('/dev-tasks/create', [DevTaskController::class, 'create']);
    Route::post('/dev-tasks', [DevTaskController::class, 'store']);
    Route::get('/dev-tasks/{devTask}/edit', [DevTaskController::class, 'edit']);
    Route::put('/dev-tasks/{devTask}', [DevTaskController::class, 'update']);
    Route::delete('/dev-tasks/{devTask}', [DevTaskController::class, 'destroy']);

    // Contact requests
    Route::get('/contacts', [ContactRequestController::class, 'contacts'])->name('admin.contacts');
    Route::get('/contacts/{contact}', [ContactRequestController::class, 'showContact']);
    Route::delete('/contacts/{contact}', [ContactRequestController::class, 'destroyContact']);

    // Developer applications
    Route::get('/developers', [ContactRequestController::class, 'developers'])->name('admin.developers');
    Route::get('/developers/{developer}', [ContactRequestController::class, 'showDeveloper']);
    Route::delete('/developers/{developer}', [ContactRequestController::class, 'destroyDeveloper']);
});
