<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MonitoringDataController;
use App\Http\Controllers\DataController;

// Route untuk layout
Route::get('/layouts', [MonitoringController::class, 'index']);

// Route default
Route::get('/', function () {
    return view('welcome');
});

// Route untuk menyimpan data monitoring
Route::post('/monitoring-data', [MonitoringDataController::class, 'store']);

// Route untuk menampilkan data monitoring dari database
Route::get('/monitoring-data', [MonitoringDataController::class, 'index']);

// Route untuk mengambil data monitoring dari API eksternal
Route::get('/monitoring-data', [DataController::class, 'showMonitoringData']);
Route::post('/monitoring-data', [DataController::class, 'showMonitoringData']);

