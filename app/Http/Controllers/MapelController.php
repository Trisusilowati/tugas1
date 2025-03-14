<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('mapel')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($mapel) {
                    return view('backend.mapel.aksi', compact('mapel'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $mapel = Mapel::all(); // Ambil semua data dari model Mapel
        return view('backend.mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('backend.mapel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Simpan data baru ke database
        $mapel = Mapel::create([
            'name' => $request->name
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('mapel')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mapel = DB::table('mapel')->where('id', $id)->first();
        return view('backend.mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->name = $request->name;
        // Hanya update password jika field password diisi
        $mapel->save();

        return redirect()->route('mapel')
            ->with('success', 'mapel berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('mapel')->where('id', $id)->delete();
        return redirect()->route('mapel.index')
            ->with('delete_success', 'mapel berhasil dihapus!');

    }



}
