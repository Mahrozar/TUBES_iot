<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonitoringData;

class MonitoringDataController extends Controller
{
    public function store(Request $request)
    {
       
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'device_id' => 'required|string',
            'parameter' => 'required|string',
            'value' => 'required|numeric',
            'created_at' => 'nullable|date', // Bisa diisi atau tidak
        ]);

        // Jika `created_at` tidak ada, gunakan waktu sekarang
        $validatedData['created_at'] = $validatedData['created_at'] ?? now();

        // Menyimpan data ke dalam tabel
        $data = MonitoringData::create($validatedData);

        return response()->json([
            'message' => 'Data berhasil disimpan.',
            'data' => $data,
        ], 201);
    }
}
