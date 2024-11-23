<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;


class PasienController extends Controller
{
    public function index()
    {
        $rumahSakits = RumahSakit::all();
        $pasiens = Pasien::with('rumahSakit')->get();
        return view('pasien.index', compact('pasiens', 'rumahSakits'));
    }

    public function create()
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.create', compact('rumahSakits'));
    }

    public function store(Request $request)
{
    // Validasi data input dari form
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'telepon' => 'required|string|max:15',
        'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
    ]);

    // Menyimpan data ke database
    Pasien::create($validated);

    // Redirect dengan pesan sukses
    return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
}

    public function filterByRumahSakit($id)
    {
        $pasiens = Pasien::where('rumah_sakit_id', $id)->get();
        return response()->json($pasiens);
    }

    public function destroy($id)
    {
        Pasien::destroy($id);
        return response()->json(['success' => true]);
    }
}