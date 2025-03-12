<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class UserController extends Controller
{
   public function index()
   {
    $users = DB::table('users')->get();

    // dd($users);
    $users = User::paginate(3); // Menampilkan 10 data per halaman
    return view('backend.user.index', compact('users'));
   }

   public function create()
   {
    return view('backend.user.create');
   }

   
// create function store with validation
public function store(Request $request)
{
    $request->validate([
        'name'                  => 'required|string|max:255',
        'email'                 => 'required|email|unique:users,email',
        'password'              => 'required|string|min:6|confirmed',
    ]);

    $user = new User;
    $user->name     = $request->name;
    $user->email    = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->route('user.index')
                     ->with('success', 'User berhasil ditambahkan!');
}


   public function edit($id)
   {
    $user = DB::table('users')->where('id', $id)->first();
    return view('backend.user.edit', compact('user'));
   }

   public function update(Request $request, $id)
{
    $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,   
    ]);

    $user = User::findOrFail($id);
    $user->name  = $request->name;
    $user->email = $request->email;
    // Hanya update password jika field password diisi
    if($request->filled('password')){
        $user->password = bcrypt($request->password);
    }
    $user->save();

    return redirect()->route('user.index')
                     ->with('success', 'User berhasil diupdate!');
}


   public function delete($id)
   {
    DB::table('users')->where('id', $id)->delete();
    return redirect()->route('user.index')
                 ->with('delete_success', 'User berhasil dihapus!');

   }
}

