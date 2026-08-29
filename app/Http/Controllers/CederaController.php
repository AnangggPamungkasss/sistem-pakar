<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cedera;
use App\Models\Notifikasi;

class CederaController extends Controller
{
    private function rolePrefix()
    {
        return Auth::user()->role_id == 1 ? 'admin' : 'pakar';
    }

    public function index()
    {
        $cedera = Cedera::paginate(3);
        return view('dashboard.cedera', compact('cedera'));
    }

    public function create()
    {
        return view('dashboard.tambah_cedera');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cedera' => 'required',
            'penanganan' => 'nullable',
        ]);

        $penangananArray = [];
        if (!empty($request->penanganan)) {
            $penangananArray = array_filter(array_map('trim', explode('.', $request->penanganan)));
        }


        $lastKode = Cedera::max('kode_cedera');
        $nextKode = 'C'. str_pad((int) filter_var($lastKode, FILTER_SANITIZE_NUMBER_INT) + 1, 3, '0', STR_PAD_LEFT);

        Cedera::create([
            'kode_cedera' => $nextKode,
            'nama_cedera' => $request->nama_cedera,
            'penanganan' => $penangananArray,
        ]);

        if (Auth::user()->role_id == 2) {
            Notifikasi::create([
                'tipe' => 'aktivitas_pakar',
                'pesan' => Auth::user()->name . ' menambahkan cedera baru: ' . $request->nama_cedera,
                'dibaca' => false,
                'dibuat_oleh' => Auth::id(),
                'target_role' => 1 // khusus admin
            ]);
        }
        

        return redirect()->route($this->rolePrefix().'.cedera.index')->with('success', 'Data cedera berhasil ditambahkan');
    }

    public function edit($id)
    {
        $cedera = Cedera::findOrFail($id);
        return view('dashboard.edit_cedera', compact('cedera'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_cedera' => 'required',
            'penanganan' => 'nullable',
        ]);

        $penangananArray = [];
        if (!empty($request->penanganan)) {
            $penangananArray = array_filter(array_map('trim', explode('.', $request->penanganan)));
        }

        $cedera = Cedera::findOrFail($id);
        $cedera->update([
            'nama_cedera' => $request->nama_cedera,
            'penanganan' => $penangananArray,
        ]);

        if (Auth::user()->role_id == 2) {
            Notifikasi::create([
                'tipe' => 'aktivitas_pakar',
                'pesan' => Auth::user()->name . ' memperbarui cedera: ' . $request->nama_cedera,
                'dibaca' => false,
                'dibuat_oleh' => Auth::id(),
                'target_role' => 1 // khusus admin
            ]);
        }
        

        return redirect()->route($this->rolePrefix().'.cedera.index')->with('success', 'Data cedera berhasil diperbarui');
    }

    public function destroy($id)
    {
        $cedera = Cedera::findOrFail($id);
        $nama = $cedera->nama_cedera;
        $cedera->delete();

        if (Auth::user()->role_id == 2) {
            Notifikasi::create([
                'tipe' => 'aktivitas_pakar',
                'pesan' => Auth::user()->name . ' mengapus cedera: ' . $request->nama_cedera,
                'dibaca' => false,
                'dibuat_oleh' => Auth::id(),
                'target_role' => 1 // khusus admin
            ]);
        }


        return redirect()->route($this->rolePrefix().'.cedera.index')->with('success', 'Data cedera berhasil dihapus');
    }

    
}
