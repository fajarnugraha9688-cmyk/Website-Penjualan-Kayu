<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    /**
     * Proses Login
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // Jika Admin
            if (Auth::user()->role === 'admin') {

                return redirect('/admin');

            }

            // Jika Customer sedang Checkout
            if ($request->session()->has('checkout')) {

                return redirect('/pembayaran');

            }

            // Customer biasa
            return redirect('/');

        }

        return back()
            ->withInput()
            ->with('error', 'Email atau Password salah.');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}