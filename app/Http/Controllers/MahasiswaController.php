<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->paginate(6);
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim|max:10',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal' => 'required|integer|min:1|max:31',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'email' => 'required|email|unique:mahasiswas,email',
            'prodi' => 'required|string|max:50',
            'alamat' => 'required|string',
        ]);

        $validated['tgl_lahir'] = sprintf('%04d-%02d-%02d', $validated['tahun'], $validated['bulan'], $validated['tanggal']);
        unset($validated['tanggal'], $validated['bulan'], $validated['tahun']);

        Mahasiswa::create($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id . '|max:10',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal' => 'required|integer|min:1|max:31',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'prodi' => 'required|string|max:50',
            'alamat' => 'required|string',
        ]);

        $validated['tgl_lahir'] = sprintf('%04d-%02d-%02d', $validated['tahun'], $validated['bulan'], $validated['tanggal']);
        unset($validated['tanggal'], $validated['bulan'], $validated['tahun']);

        $mahasiswa->update($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mahasiswa::destroy($id);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil dihapus.');
    }
}
