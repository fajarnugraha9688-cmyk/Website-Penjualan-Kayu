<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman register
     */
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register Customer'
        ]);
    }

    /**
     * Menyimpan data customer
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:100',

            'email' => 'required|email|unique:users,email',

            'no_hp' => 'required|max:20',

            'alamat' => 'required',

            'password' => 'required|min:6|confirmed',

        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'no_hp' => $request->no_hp,

            'alamat' => $request->alamat,

            'role' => 'customer',

            'password' => Hash::make($request->password),

        ]);

        return redirect('/login')
            ->with('success', 'Registrasi berhasil. Silakan login.');

    }
}