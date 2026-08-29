<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    
        // Admin = role 1
        if ($user->role_id != 1) {
            abort(403, 'Tidak punya akses');
        }
    
        $notifikasi = Notifikasi::where('target_role', 1)
                                ->where('dibuat_oleh', '!=', $user->id)
                                ->latest()
                                ->get();
    
        $belumDibaca = Notifikasi::where('target_role', 1)
                                 ->where('dibuat_oleh', '!=', $user->id)
                                 ->where('dibaca', false)
                                 ->count();
    
        return view('admin.notifikasi.index', compact('notifikasi', 'belumDibaca'));
    }    

    public function tandaiDibaca($id)
{
    $notif = Notifikasi::findOrFail($id);
    $notif->dibaca = true;
    $notif->save();

    return response()->json(['success' => true]);
}

}