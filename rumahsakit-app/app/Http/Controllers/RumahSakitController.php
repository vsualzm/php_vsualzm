<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $rumahSakits = RumahSakit::all();
        return view('rumah_sakit.index', compact('rumahSakits'));
    }

    public function create()
    {
        return view('rumah_sakit.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:15',
        ]);
    
        RumahSakit::create($validated);
    
        return redirect()->route('rumah-sakit.index')->with('success', 'Rumah Sakit berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rumahSakit = RumahSakit::findOrFail($id);
        return view('rumah_sakit.edit', compact('rumahSakit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:rumah_sakits,email,' . $id,
            'telepon' => 'required',
        ]);

        $rumahSakit = RumahSakit::findOrFail($id);
        $rumahSakit->update($request->all());
        return redirect()->route('rumah-sakit.index')->with('success', 'Rumah Sakit berhasil diperbarui.');
    }

    public function destroy($id)
    {
        RumahSakit::destroy($id);
        return response()->json(['success' => true]);
    }
}
