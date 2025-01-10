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
            $response = Http::get('https://3566-114-10-147-146.ngrok-free.app/sensor');

            // Periksa apakah respons berhasil
            if ($response->successful()) {
                $data = $response->json();

                // Memastikan format data yang benar
                $formattedData = [];
                if (isset($data['data']) && is_array($data['data'])) {
                    // Mengelompokkan data berdasarkan parameter (misal: temperature, humidity, etc)
                    foreach ($data['data'] as $item) {
                        $parameter = $item['parameter'] ?? '';
                        if (!empty($parameter)) {
                            // Kelompokkan data berdasarkan parameter
                            $formattedData[$parameter][] = [
                                'device_id' => $item['device_id'] ?? 'unknown',
                                'value' => $item['value'] ?? 0,
                                'created_at' => $item['created_at'] ?? now()->toISOString(),
                            ];
                        }
                    }

                    // Batasi setiap kelompok data menjadi 10 item terbaru
                    foreach ($formattedData as $parameter => $items) {
                        // Urutkan berdasarkan 'created_at' secara menurun
                        usort($items, function ($a, $b) {
                            return strtotime($b['created_at']) - strtotime($a['created_at']);
                        });

                        // Ambil hanya 10 data terbaru
                        $formattedData[$parameter] = array_slice($items, 0, 10);
                    }

                    // Kirim data ke view dengan format yang benar
                    return view('layouts.index', [
                        'data' => $formattedData, // Data terstruktur dengan parameter sebagai key
                        'error' => null,
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
