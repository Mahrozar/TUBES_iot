<?php

namespace App\Http\Controllers;

use App\Models\MonitoringData; // Pastikan model MonitoringData sudah ada
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    /**
     * Menampilkan halaman index dengan semua data monitoring.
     */
    public function index()
    {
        // Ambil semua data dari tabel monitoring_data menggunakan model Eloquent
        $data = MonitoringData::all();

        // Kirim data ke view
        return view('layouts.index', compact('data'));
    }
}
