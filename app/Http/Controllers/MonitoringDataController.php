<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonitoringData;
use Illuminate\Support\Facades\DB;

class MonitoringDataController extends Controller
{
    // Menampilkan data monitoring berdasarkan parameter
    public function index()
    {
        // Ambil semua data dari tabel monitoring_data
        $data = DB::table('monitoring_data')->get();

        // Kirim data ke view dengan compact
        return view('layouts.index', [
            'data' => $data
        ]);
    }

    // Menyimpan data monitoring
    public function store(Request $request) {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'device_id' => 'required|string',
            'parameter' => 'required|string|in:temperature,humidity,light intensity',
            'value' => 'required|numeric',
            'created_at' => 'nullable|date', // Optional
        ]);

        // Jika `created_at` tidak ada, gunakan waktu sekarang
        $validatedData['created_at'] = $validatedData['created_at'] ?? now();

        // Menyimpan data ke dalam tabel
        $data = MonitoringData::create($validatedData);

        // Mengembalikan respons JSON
        return response()->json([
            'message' => 'Data berhasil disimpan.',
            'data' => $data,
        ], 201); // HTTP status 201 Created
    }
}
