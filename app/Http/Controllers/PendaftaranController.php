<?php

namespace App\Http\Controllers;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{

    public function index()
    {
        $pendaftaran = Pendaftaran::all(); // Ambil semua data pendaftar
        return view('backend.pendaftaran.index', compact('pendaftaran'));
    }
    
    public function create()
    {
        return view('auth.create'); 
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input   
        $validateData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|numeric|unique:pendaftaran,nisn',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'nomor_hp' => 'required|numeric',
            'alamat_email' => 'required|email|unique:pendaftaran,alamat_email',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'jurusan_pertama' => 'required|string|max:255',
            'jurusan_kedua' => 'nullable|string|max:255',
            'jurusan_ketiga' => 'nullable|string|max:255',   
        ]);

        // Simpan data ke database
        Pendaftaran::create($validateData);

        return redirect('/')->with('success', 'Pendaftaran berhasil! Anda sudah terdaftar.');
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('backend.pendaftaran.edit', compact('pendaftaran'));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $validateData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|numeric|unique:pendaftaran,nisn,' . $id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'nomor_hp' => 'required|numeric',
            'alamat_email' => 'required|email|unique:pendaftaran,alamat_email,' . $id,
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'jurusan_pertama' => 'required|string|max:255',
            'jurusan_kedua' => 'nullable|string|max:255',
            'jurusan_ketiga' => 'nullable|string|max:255',
        ]);

        $pendaftaran->update($validateData);

        return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil dihapus!');
    }
}
