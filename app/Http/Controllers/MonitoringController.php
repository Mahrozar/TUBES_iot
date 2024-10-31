<?php

namespace App\Http\Controllers;

use App\Models\MonitoringData; // Pastikan ini ada untuk menggunakan model
use Illuminate\Http\Request;
use Carbon\Carbon;

class MonitoringController extends Controller
{
    public function index()
{
    $data = MonitoringData::all();
    return view('layouts.index', [
        'data' => $data,
        'content' => 'monitoring.data', 
    ]);
}

public function overview()
{
    $data = MonitoringData::all();

    $totalDevices = $data->count();
    $averageValue = $data->avg('value'); 
    $lastUpdated = Carbon::parse($data->max('created_at')); // Pastikan ini adalah objek Carbon

    return view('layouts.index', [
        'data' => $data,
        'content' => 'monitoring.overview',
        'totalDevices' => $totalDevices,
        'averageValue' => $averageValue,
        'lastUpdated' => $lastUpdated,
    ]);
}


public function dataMonitoring() {
    $data = MonitoringData::all();
    return view('layouts.index', [
        'data' => $data,
        'content' => 'monitoring.data',
    ]);
}

}
