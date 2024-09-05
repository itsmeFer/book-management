<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'suggestion' => 'required|string',
        ]);

        // Simpan saran ke database
        Suggestion::create([
            'name' => $request->name,
            'suggestion' => $request->suggestion,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Saran Anda berhasil dikirim.');
    }
}
