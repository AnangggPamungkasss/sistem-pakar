<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gejala;
use App\Models\Notifikasi;

class GejalaController extends Controller
{

    private function rolePrefix()
    {
        return Auth::user()->role_id == 1 ? 'admin' : 'pakar';
    }

    public function index ()
    {
        $gejala = Gejala::paginate(10);
        return view('dashboard.gejala', compact('gejala'));
    }

    public function create()
    {
        return view('dashboard.tambah_gejala');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $lastGejala = Gejala::orderBy('id', 'desc')->first();

        if (!$lastGejala) {
            $newCode = 'G001';
        } else {
            $lastNumber = (int) substr($lastGejala->kode_gejala, 1);
            $newNumber = $lastNumber + 1;
            $newCode = 'G' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        }

        $data = [
            'kode_gejala' => $newCode,
            'nama_gejala' => $request->nama_gejala,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gejala', 'public');
        }
        

        Gejala::create($data);

        if (Auth::user()->role_id == 2) {
            Notifikasi::create([
                'tipe' => 'aktivitas_pakar',
                'pesan' => Auth::user()->name . ' menambahkan gejala baru: ' . $request->nama_gejala,
                'dibaca' => false,
                'dibuat_oleh' => Auth::id(),
                'target_role' => 1 // khusus admin
            ]);
        }

       return redirect()
            ->route($this->rolePrefix().'.gejala.index')->with('success', 'Gejala berhasil ditambahkan');
    }

    public function edit($id)
    {
        $gejala= Gejala::FindOrFail($id);
        return view('dashboard.edit_gejala', compact('gejala'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);
        
        $gejala = Gejala::FindOrFail($id);
        $data = [
            'nama_gejala' => $request->nama_gejala,
        ];
    
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gejala', 'public');
        }
    
        $gejala->update($data);
        if (Auth::user()->role_id == 2) {
            Notifikasi::create([
                'tipe' => 'aktivitas_pakar',
                'pesan' => Auth::user()->name . ' memperbarui gejala: ' . $request->nama_gejala,
                'dibaca' => false,
                'dibuat_oleh' => Auth::id(),
                'target_role' => 1 // khusus admin
            ]);
        }
        return redirect()->route($this->rolePrefix().'.gejala.index')->with('success', 'Gejala berhasil diperbarui');
    }
    
    public function destroy($id)
    {
        $gejala = Gejala::FindOrFail($id);
        $nama = $gejala->nama_gejala;
        $gejala->delete();

        if (Auth::user()->role_id == 2) {
            Notifikasi::create([
                'tipe' => 'aktivitas_pakar',
                'pesan' => Auth::user()->name . ' menghapus gejala: ' . $request->nama_gejala,
                'dibaca' => false,
                'dibuat_oleh' => Auth::id(),
                'target_role' => 1 // khusus admin
            ]);
        }

        return redirect()
        ->route($this->rolePrefix().'.gejala.index')->with('success', 'Gejala berhasil dihapus');
    }

    public function simpanRiwayat(Request $request)
{

    $riwayat = RiwayatDiagnosa::create([
        'user_id'  => Auth::id(),
        'cedera_id'=> $request->cedera_id,
    ]);

    // jika ada relasi many-to-many dengan gejala
    if($request->gejala){
        $riwayat->gejala()->attach($request->gejala);
    }

    return response()->json([
        'status' => 'success',
        'message' => 'Riwayat diagnosa berhasil disimpan'
    ]);
}

}
