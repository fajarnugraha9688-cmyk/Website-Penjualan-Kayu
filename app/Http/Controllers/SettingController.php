<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * ==========================================================
     * HALAMAN PENGATURAN WEBSITE
     * ==========================================================
     */
    public function index()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = Setting::create([]);
        }

        return view('admin.pengaturan.index', [
            'title'   => 'Pengaturan Website',
            'setting' => $setting,
        ]);
    }

    /**
     * ==========================================================
     * SIMPAN PENGATURAN WEBSITE
     * ==========================================================
     */
    public function update(Request $request)
    {
        $setting = Setting::firstOrCreate([]);

        $request->validate([

            /*
            |--------------------------------------------------------------------------
            | HEADER WEBSITE
            |--------------------------------------------------------------------------
            */

            'nama_perusahaan' => 'required|max:255',
            'tagline'          => 'nullable|max:255',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            /*
            |--------------------------------------------------------------------------
            | BERANDA
            |--------------------------------------------------------------------------
            */

            'hero_judul'       => 'required|max:255',
            'hero_deskripsi'   => 'required',

            'hero_banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            /*
            |--------------------------------------------------------------------------
            | TENTANG KAMI
            |--------------------------------------------------------------------------
            */

            'tentang_judul'       => 'required|max:255',
            'tentang_deskripsi'   => 'required',
            'sejarah'             => 'nullable',
            'visi'                => 'required',
            'misi'                => 'required',
            'keunggulan'          => 'nullable',

            'foto_tentang' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            /*
            |--------------------------------------------------------------------------
            | KONTAK
            |--------------------------------------------------------------------------
            */

            'alamat'     => 'required',
            'telepon'    => 'nullable|max:30',
            'whatsapp'   => 'required|max:30',
            'email'      => 'nullable|email',
            'instagram'  => 'nullable|max:255',
            'facebook'   => 'nullable|max:255',

            /*
            |--------------------------------------------------------------------------
            | PEMBAYARAN
            |--------------------------------------------------------------------------
            */

            'nama_bank'       => 'required|max:100',
            'nomor_rekening'  => 'required|max:100',
            'atas_nama'       => 'required|max:255',

            /*
            |--------------------------------------------------------------------------
            | FOOTER
            |--------------------------------------------------------------------------
            */

            'footer_deskripsi' => 'nullable',

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD LOGO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                Storage::disk('public')->delete($setting->logo);
            }

            $setting->logo = $request
                ->file('logo')
                ->store('website/logo', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | UPLOAD HERO BANNER
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('hero_banner')) {

            if ($setting->hero_banner && Storage::disk('public')->exists($setting->hero_banner)) {
                Storage::disk('public')->delete($setting->hero_banner);
            }

            $setting->hero_banner = $request
                ->file('hero_banner')
                ->store('website/banner', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO TENTANG
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto_tentang')) {

            if ($setting->foto_tentang && Storage::disk('public')->exists($setting->foto_tentang)) {
                Storage::disk('public')->delete($setting->foto_tentang);
            }

            $setting->foto_tentang = $request
                ->file('foto_tentang')
                ->store('website/tentang', 'public');
        }

      

                /*
        |--------------------------------------------------------------------------
        | SIMPAN DATA WEBSITE
        |--------------------------------------------------------------------------
        */

        $setting->nama_perusahaan    = $request->nama_perusahaan;
        $setting->tagline            = $request->tagline;

        $setting->hero_judul         = $request->hero_judul;
        $setting->hero_deskripsi     = $request->hero_deskripsi;

        $setting->tentang_judul      = $request->tentang_judul;
        $setting->tentang_deskripsi  = $request->tentang_deskripsi;
        $setting->sejarah            = $request->sejarah;
        $setting->visi               = $request->visi;
        $setting->misi               = $request->misi;
        $setting->keunggulan         = $request->keunggulan;

        $setting->alamat             = $request->alamat;
        $setting->telepon            = $request->telepon;
        $setting->whatsapp           = $request->whatsapp;
        $setting->email              = $request->email;
        $setting->instagram          = $request->instagram;
        $setting->facebook           = $request->facebook;

        $setting->nama_bank          = $request->nama_bank;
        $setting->nomor_rekening     = $request->nomor_rekening;
        $setting->atas_nama          = $request->atas_nama;

        $setting->footer_deskripsi   = $request->footer_deskripsi;

        $setting->save();

        return redirect()
            ->route('pengaturan.index')
            ->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}