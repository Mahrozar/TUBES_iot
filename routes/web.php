<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MonitoringDataController;
Route::get('/layouts', [MonitoringController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
Route::post('/monitoring-data', [MonitoringDataController::class, 'store']);
Route::get('/monitoring-data', [MonitoringDataController::class, 'store']);
