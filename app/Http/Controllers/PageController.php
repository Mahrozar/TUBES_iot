<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function updateSettings(Request $request)
    {
        // Validasi input
        $request->validate([
            'notification' => 'required|boolean',
            'theme' => 'required|string',
        ]);

        // Simpan pengaturan ke sesi
        session([
            'notification' => $request->input('notification'),
            'theme' => $request->input('theme'),
        ]);

        return redirect()->route('settings')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
