<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ControllerMahasiswa extends Controller
{
    public function index()
    {
        $mhs = Mahasiswa::all();
        return view('mahasiswa.index', compact('mhs'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswa',
            'alamat' => 'required',
        ]);

        Mahasiswa::create($req->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil disimpan.');
    }

    public function edit(Mahasiswa $mhs, $id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mhs'));
    }
    
    public function update(Request $req, Mahasiswa $mhs, $id)
    {
        $newData = $req->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswa,nim,'.$id,
            'alamat' => 'required',
        ]);

        $mhs = Mahasiswa::findOrFail($id);
        $mhs->update($newData);
        return redirect()->route('mahasiswa.index')->with('success', 'Update data berhasil.');
    }

    public function destroy(Mahasiswa $mhs, $id)
    {
        try{
            $mhs = Mahasiswa::findOrFail($id);
            $mhs->delete();
            return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus.');
        } 
        catch(\Exception $e){
            return redirect()->route('mahasiswa.index')->with('error', 'Gagal menghapus data: '.$e->getMessage());
        }
    }

}
