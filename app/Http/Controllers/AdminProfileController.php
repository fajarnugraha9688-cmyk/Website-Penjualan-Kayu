<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AdminProfileController extends Controller
{
    /**
     * ==========================================================
     * HALAMAN PROFIL ADMIN
     * ==========================================================
     */
    public function index()
    {
        return view('admin.profil.index', [

            'title' => 'Profil Admin',

            'user' => Auth::user(),

        ]);
    }

    /**
     * ==========================================================
     * UPDATE PROFIL ADMIN
     * ==========================================================
     */
    public function update(Request $request)
    {
         
        /** @var User $user */
        $user = Auth::user();

        $request->validate([

            'name' => 'required|max:255',

            'email' => 'required|email|unique:users,email,' . $user->id,

            'no_hp' => 'nullable|max:20',

            'alamat' => 'nullable',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'password' => [
                'nullable',
                'confirmed',
                Password::min(6),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Foto
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            if ($user->foto) {

                Storage::disk('public')->delete($user->foto);

            }

            $user->foto = $request
                ->file('foto')
                ->store('admin', 'public');

        }

        /*
        |--------------------------------------------------------------------------
        | Data Profil
        |--------------------------------------------------------------------------
        */

        $user->name = $request->name;

        $user->email = $request->email;

        $user->no_hp = $request->no_hp;

        $user->alamat = $request->alamat;

        /*
        |--------------------------------------------------------------------------
        | Password
        |--------------------------------------------------------------------------
        */

        if ($request->filled('password')) {

            $user->password = Hash::make($request->password);

        }

        $user->save();

        return redirect()
            ->back()
            ->with('success', 'Profil admin berhasil diperbarui.');
    }
}