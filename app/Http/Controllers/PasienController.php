<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Tampilkan semua pasien
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.sync.index', compact('pasiens'));
    }

    // Form tambah pasien
    public function create()
    {
        return view('pasien.sync.create');
    }

    // Simpan data pasien
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required|integer',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    // Form edit pasien
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.sync.edit', compact('pasien'));
    }

    // Update data pasien
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required|integer',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    // Hapus data pasien
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
