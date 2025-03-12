<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use DB;


class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('students')->select('*')->paginate(3);
        return view('backend.student.index', compact('students'));
    }

    public function create()
    {
        return view('backend.student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'class' => 'required',
            'addres' => 'required',
            'gender' => 'required|in:male,female',
            'status' => 'required|in:active,inactive',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Cek apakah photo diunggah atau tidak
        if ($request->hasFile('photo')) {
            // Simpan foto dengan custom nama (menggunakan timestamp + nama asli tanpa spasi)
            $originalName = pathinfo($request->photo->getClientOriginalName(), PATHINFO_FILENAME);
            $photoName = time() . '_' . str_replace(' ', '_', $originalName) . '.' . $request->photo->extension();

            // Pindahkan foto ke folder public/photos
            $request->photo->move(public_path('backend/photos'), $photoName);

            // Path foto yang akan disimpan di database
            $photoPath = 'photos/' . $photoName;
        } else {
            // Jika tidak ada foto, gunakan default placeholder
            $photoPath = 'photos/default.png'; // Bisa diganti sesuai kebutuhan
        }

        // Simpan data ke database termasuk nama file foto
        DB::table('students')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'class' => $request->class,
            'addres' => $request->addres,
            'gender' => $request->gender,
            'status' => $request->status,
            'photo' => 'photos/' . $photoName, // Simpan path foto di database
        ]);

        return redirect()->route('students')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $student = DB::table('students')->where('id', $id)->first();

        return view('backend.student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'class' => 'required',
            'addres' => 'required',
            'gender' => 'required|in:male,female',
            'status' => 'required|in:active,inactive',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil data lama dari database
        $student = DB::table('students')->where('id', $id)->first();

        if (!$student) {
            return back()->with('error', 'Data tidak ditemukan.');
        }

        // Inisialisasi path foto dengan yang lama
        $photoPath = $student->photo;

        // Cek apakah photo diunggah atau tidak
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika bukan default
            if ($student->photo && $student->photo !== 'photos/default.png') {
                $oldPhotoPath = public_path('backend/'. $student->photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath); // Hapus foto lama dari storage
                }
            }

            // Simpan foto baru dengan custom nama
            $originalName = pathinfo($request->photo->getClientOriginalName(), PATHINFO_FILENAME);
            $photoName = time() . '_' . str_replace(' ', '_', $originalName) . '.' . $request->photo->extension();

            // Pindahkan foto ke folder public/backend/photos
            $request->photo->move(public_path('backend/photos'), $photoName);

            // Update path foto
            $photoPath = 'photos/' . $photoName;
        }

        // Update data di database
        DB::table('students')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'class' => $request->class,
            'addres' => $request->addres,
            'gender' => $request->gender,
            'status' => $request->status,
            'photo' => $photoPath, // Perbarui hanya jika ada foto baru
        ]);

        return redirect()->route('students')->with('success', 'Data berhasil diubah.');
    }

    public function destroy($id)
    {
        // Hapus foto lama jika bukan default
        $student = DB::table('students')->where('id', $id)->first();
        if ($student->photo && $student->photo !== 'photos/default.png') {
            $photoPath = public_path('backend/' . $student->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath); // Hapus foto lama dari storage
            }
        }

        // Hapus data dari database
        DB::table('students')->where('id', $id)->delete();

        return redirect()->route('students')->with('success', 'Data berhasil dihapus.');
    }

    
}