<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::latest()->paginate(10);
        return view('dosen.index', ['dosen' => $dosen]);
    }

    
    public function create()
    {
        return view('dosen.create');
    }

    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nik' => 'required|unique:dosens,nik|max:15',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens',
            'notelp' => 'required',
            'prodi' => 'required|string',
            'alamat' => 'required|string',
        ]);

        Dosen::create($validate);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data Dosen berhasil disimpan.');
    }

    
    public function show(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.show', ['dosen' => $dosen]);
    }

  
    public function edit(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        
        return view('dosen.edit', ['dosen' => $dosen]);
    }

    
    public function update(Request $request, string $id)
    {
        $dosen = Dosen::findOrFail($id);

        $validate = $request->validate([
            'nik' => 'required|unique:dosens,nik,'. $dosen->id . '|max:15',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email,' .$dosen->id,
            'notelp' => 'required',
            'prodi' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $dosen->update($validate);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        Dosen::destroy($id);
        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}
