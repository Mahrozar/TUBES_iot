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

// Route untuk menampilkan data monitoring dari API eksternal
Route::get('/monitoring-data', [DataController::class, 'showMonitoringData']);  // Untuk mendapatkan data dari API eksternal

// Route untuk menyimpan data monitoring (jika diperlukan)
// Anda dapat menambahkan route ini jika ingin menambahkan fungsi untuk menyimpan data
// Route::post('/monitoring-data', [DataController::class, 'store']); 
