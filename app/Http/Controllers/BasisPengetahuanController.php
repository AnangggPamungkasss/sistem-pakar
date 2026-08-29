<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BasisPengetahuan;
use App\Models\Cedera;
use App\Models\Gejala;
use App\Models\Notifikasi;

class BasisPengetahuanController extends Controller
{
    private function routePrefix()
    {
        $role = auth()->user()->role_id;
        return $role == 1 ? 'admin' : 'pakar';
    }

    public function index()
    {
        $cedera = Cedera::with('basisPengetahuan.gejala')->paginate(5);
        $prefix = $this->routePrefix();

        return view('dashboard.basis_pengetahuan', compact('cedera', 'prefix'));
    }

    public function kelola($id)
    {
        $cedera = Cedera::findOrFail($id);
        $gejala = Gejala::all();
        $selectedGejala = $cedera->basisPengetahuan()->pluck('gejala_id')->toArray();
        $prefix = $this->routePrefix();

        return view('dashboard.kelola_basis_pengetahuan', compact('cedera', 'gejala', 'selectedGejala', 'prefix'));
    }


    public function updateKelola(Request $request, $id)
    {
        $cedera = Cedera::findOrFail($id);

        $cedera->basisPengetahuan()->delete();

        if ($request->has('gejala_id')) {
            $kodeRule = $this->generateKodeRule(); 
            foreach ($request->gejala_id as $gid) {
                BasisPengetahuan::create([
                    'kode_rule' => $kodeRule,
                    'gejala_id' => $gid,
                    'cedera_id' => $cedera->id,
                ]);
            }
        }

        $prefix = $this->routePrefix();
        // Hanya pakar yang memicu notifikasi
        if (Auth::user()->role_id == 2) {
            Notifikasi::create([
                'tipe' => 'aktivitas_pakar',
                'pesan' => Auth::user()->name . ' memperbarui basis pengetahuan untuk cedera: ' . $cedera->nama_cedera,
                'dibaca' => false,
                'dibuat_oleh' => Auth::id(),
                'target_role' => 1  // Notifikasi khusus admin
            ]);
        }

        
        return redirect()->route($prefix . '.basis_pengetahuan.index')->with('success', 'Basis Pengetahuan untuk "' . $cedera->nama_cedera . '" berhasil diperbarui');
    }

    private function generateKodeRule()
    {
        $last = BasisPengetahuan::orderBy('id', 'desc')->first();
        if (!$last) return 'R001';
        $num = (int) substr($last->kode_rule, 1);
        return 'R' . str_pad($num + 1, 3, '0', STR_PAD_LEFT);
    }
}