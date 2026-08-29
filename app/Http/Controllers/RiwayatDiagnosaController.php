<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RiwayatDiagnosa;
use App\Models\Gejala;

class RiwayatDiagnosaController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            $riwayat = RiwayatDiagnosa::with(['user','cedera'])->latest()->get();
        } else {
            $riwayat = RiwayatDiagnosa::with(['cedera'])
                        ->where('user_id', Auth::id())
                        ->latest()
                        ->get();
        }

        foreach($riwayat as $r){
            $r->gejala_nama = $r->gejala_dipilih 
                ? Gejala::whereIn('id', $r->gejala_dipilih)->pluck('nama_gejala')->toArray()
                : [];
        }
        

        return view('dashboard.riwayat_diagnosa', compact('riwayat'));
    }

    public function show($id)
    {
        $riwayat = RiwayatDiagnosa::with(['user','cedera'])->findOrFail($id);

        if (Auth::user()->role_id != 1 && $riwayat->user_id != Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        $riwayat->gejala_nama = $riwayat->gejala_dipilih 
            ? Gejala::whereIn('id', $riwayat->gejala_dipilih)->pluck('nama_gejala')->toArray()
            : [];

        return view('dashboard.riwayat_detail', compact('riwayat'));
    }

    public function destroy($id)
    {
        $riwayat = RiwayatDiagnosa::findOrFail($id);

        if (Auth::user()->role_id != 1 && $riwayat->user_id != Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus data ini.');
        }

        $riwayat->delete();

        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin.riwayat_diagnosa.index')->with('success', 'Riwayat berhasil dihapus.');
        } else {
            return redirect()->route('pasien.riwayat_diagnosa.index')->with('success', 'Riwayat berhasil dihapus.');
        }
    }
}


