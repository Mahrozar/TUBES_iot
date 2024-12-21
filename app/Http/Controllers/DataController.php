<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{

    public function showMonitoringData()
    {
        try {
            // Panggil API eksternal untuk mendapatkan data sensor
            $response = Http::get('https://hldprcql-5000.asse.devtunnels.ms/get_monitoring_data');

            // Periksa apakah respons berhasil
            if ($response->successful()) {
                // Ambil data JSON dari respons API
                $data = $response->json();

                // Pastikan data dalam format array
                if (is_array($data)) {
                    // Kirim data ke view
                    return view('layouts.index', [
                        'data' => $data,
                        'error' => null, // Tidak ada error
                    ]);
                } else {
                    // Data tidak sesuai dengan format yang diharapkan
                    return view('layouts.index', [
                        'data' => [],
                        'error' => 'Invalid data format received from the API.',
                    ]);
                }
            } else {
                // API merespons dengan status error
                return view('layouts.index', [
                    'data' => [],
                    'error' => 'Failed to fetch data from the API. Status: ' . $response->status(),
                ]);
            }
        } catch (\Exception $e) {
            // Tangkap semua exception dan tampilkan pesan error
            return view('layouts.index', [
                'data' => [],
                'error' => 'An error occurred while fetching data: ' . $e->getMessage(),
            ]);
        }
    }
}
