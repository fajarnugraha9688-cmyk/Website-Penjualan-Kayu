<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * ==========================================================
     * HALAMAN PROFIL
     * ==========================================================
     */
    public function index()
    {
        return view('profile.index', [

            'title' => 'Profil Saya',

            'user' => Auth::user()

        ]);
    }

    /**
     * ==========================================================
     * UPDATE PROFIL
     * ==========================================================
     */
    public function update(Request $request)
    {
        $request->validate([

            'name'   => 'required|string|max:100',

            'no_hp'  => 'required|string|max:20',

            'alamat' => 'required|string|max:255',

        ]);

        /** @var User $user */
        $user = Auth::user();

        $user->update([

            'name'   => $request->name,

            'no_hp'  => $request->no_hp,

            'alamat' => $request->alamat,

        ]);

        return back()->with(

            'success',

            'Profil berhasil diperbarui.'

        );
    }

    /**
     * ==========================================================
     * UPDATE FOTO PROFIL
     * ==========================================================
     */
    public function updateFoto(Request $request)
    {
        $request->validate([

            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        /** @var User $user */
        $user = Auth::user();

        if (
            $user->foto &&
            Storage::disk('public')->exists($user->foto)
        ) {

            Storage::disk('public')->delete($user->foto);

        }

        $path = $request
            ->file('foto')
            ->store('foto-profile', 'public');

        $user->update([

            'foto' => $path

        ]);

        return back()->with(

            'success',

            'Foto profil berhasil diperbarui.'

        );
    }
        /**
     * ==========================================================
     * UPDATE PASSWORD
     * ==========================================================
     */
    public function updatePassword(Request $request)
    {
        $request->validate([

            'password_lama' => 'required',

            'password' => 'required|min:8|confirmed',

        ]);

        /** @var User $user */
        $user = Auth::user();

        if (!Hash::check($request->password_lama, $user->password)) {

            return back()->with(

                'error',

                'Password lama tidak sesuai.'

            );

        }

        $user->update([

            'password' => Hash::make($request->password)

        ]);

        return back()->with(

            'success',

            'Password berhasil diperbarui.'

        );
    }

}