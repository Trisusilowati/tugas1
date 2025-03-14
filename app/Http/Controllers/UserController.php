<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class UserController extends Controller
{
   public function index(Request $request)
   {
    $search = $request->input('search');

    $users = User::query()
        ->when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%'.$search.'%')
                         ->orWhere('email', 'like', '%'.$search.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(3)
        ->appends(['search' => $search]); // Memastikan pencarian tetap ada di pagination

    return view('backend.user.index', compact('users', 'search'));
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

