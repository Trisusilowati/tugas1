<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use DB;

class TeacherController extends Controller
{
    public function index(Request $request)
   {
    $search = $request->input('search');

    $teachers = teacher::query()
        ->when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%'.$search.'%')
                         ->orWhere('email', 'like', '%'.$search.'%')
                         ->orWhere('jabatan', 'like', '%'.$search.'%')
                         ->orWhere('addres', 'like', '%'.$search.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(3)
        ->appends(['search' => $search]); // Memastikan pencarian tetap ada di pagination

    return view('backend.teacher.index', compact('teachers', 'search'));
   }

    public function create()
    {
        return view('backend.teacher.create'); // Pastikan file view ini ada
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'jabatan' => 'required',
            'addres' => 'required',
            'gender' => 'required|in:male,female',
            'status' => 'required|in:active,inactive',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $originalName = pathinfo($request->photo->getClientOriginalName(), PATHINFO_FILENAME);
            $photoName = time() . '_' . str_replace(' ', '_', $originalName) . '.' . $request->photo->extension();
            $request->photo->move(public_path('backend/photos'), $photoName);
            $photoPath = 'photos/' . $photoName;
        } else {
            $photoPath = 'photos/default.png';
        }

        DB::table('teacher')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'jabatan' => $request->jabatan,
            'addres' => $request->addres,
            'gender' => $request->gender,
            'status' => $request->status,
            'photo' => $photoPath,
        ]);

        return redirect()->route('teacher')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $teacher = DB::table('teacher')->where('id', $id)->first();
        return view('backend.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
{
    $teacher = Teacher::findOrFail($id);

    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:teacher,email,'.$id,
        'phone' => 'required|string|max:20',
        'jabatan' => 'required|string|max:255',
        'addres' => 'required|string',
        'gender' => 'required|in:male,female',
        'status' => 'required|in:active,inactive',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update data guru
    $teacher->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'jabatan' => $request->jabatan,
        'addres' => $request->addres,
        'gender' => $request->gender,
        'status' => $request->status,
    ]);

    // Cek jika ada foto yang diupload
    if ($request->hasFile('photo')) {
        // Hapus foto lama jika ada
        if ($teacher->photo && file_exists(storage_path('app/public/teacher/' . $teacher->photo))) {
            unlink(storage_path('app/public/teacher/' . $teacher->photo));
        }

        // Simpan foto baru
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/teacher', $filename);

        // Simpan nama file ke database
        $teacher->update(['photo' => $filename]);
    }

    return redirect()->route('teacher')->with('success', 'Data guru berhasil diperbarui!');
}


    public function destroy($id)
    {
        $teacher = DB::table('teacher')->where('id', $id)->first();
        if ($teacher->photo && $teacher->photo !== 'photos/default.png') {
            $photoPath = public_path('backend/' . $teacher->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        DB::table('teacher')->where('id', $id)->delete();

        return redirect()->route('teacher')->with('success', 'Data berhasil dihapus.');
    }
}