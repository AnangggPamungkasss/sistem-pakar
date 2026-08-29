<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gejala;
use App\Models\Cedera;
use App\Models\BasisPengetahuan;
use App\Models\RiwayatDiagnosa;

class DiagnosaController extends Controller
{
    public function index()
    {
        return $this->renderDiagnosa('diagnosa.diagnosa_index');
    }

    public function publicIndex()
    {
        return $this->renderDiagnosa('home');
    }

    private function renderDiagnosa($view)
    {
        $gejala = Gejala::all();
        $cedera = Cedera::all();
        $basispengetahuan = BasisPengetahuan::with(['cedera', 'gejala'])->get();

        $gejalaJs = $gejala->map(fn($g) => [
            'id' => $g->id,
            'nama_gejala' => $g->nama_gejala,
            'gambar' => $g->gambar ? asset('storage/'.$g->gambar) : null
        ]);

        $rulesJs = $basispengetahuan->groupBy('cedera.nama_cedera')->map(function($items, $namaCedera) {
            return [
                'nama_cedera' => $namaCedera,
                'gejala' => $items->map(fn($bp) => [
                    'id' => $bp->gejala->id,
                    'nama_gejala' => $bp->gejala->nama_gejala,
                    'gambar' => $bp->gejala->gambar ? asset('storage/'.$bp->gejala->gambar) : null
                ])->values()
            ];
        })->values();

        $cederaJs = $cedera->mapWithKeys(fn($c) => [
            $c->nama_cedera => ['penanganan' => $c->penanganan ?: []]
        ])->toArray();

        return view($view, compact('gejala','cedera','basispengetahuan','gejalaJs','rulesJs','cederaJs'));
    }

    public function simpanRiwayat(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Silakan login terlebih dahulu']);
        }

        if (!$request->is_valid || $request->is_valid === 'false') {
            return response()->json(['status' => 'ignored', 'message' => 'Hasil tidak valid, tidak disimpan']);
        }

        $cedera = Cedera::where('nama_cedera', $request->cedera_nama)->first();
        if (!$cedera) {
            return response()->json(['status' => 'error', 'message' => 'Cedera tidak ditemukan']);
        }

        $gejala = $request->gejala ?? [];
        if (empty($gejala)) {
            return response()->json(['status' => 'error', 'message' => 'Gejala tidak boleh kosong']);
        }

        $riwayat = RiwayatDiagnosa::create([
            'user_id' => $user->id,
            'cedera_id' => $cedera->id,
            'gejala_dipilih' => $gejala
        ]);

        return response()->json(['status' => 'success', 'data' => $riwayat]);
    }

    public function riwayatDiagnosa()
{
    $user = Auth::user();

    if ($user->role_id == 1) {
        $riwayat = RiwayatDiagnosa::with(['user', 'cedera'])->latest()->get();
    } else {
        $riwayat = RiwayatDiagnosa::with(['cedera'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();
    }

    return view('dashboard.riwayat_diagnosa', compact('riwayat'));
}

}