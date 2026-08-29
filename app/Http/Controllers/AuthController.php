<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Coba login
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
    
            $roleId = Auth::user()->role_id;
    
            switch ($roleId) {
                case 1: // atmint
                    return redirect()->route('admin.riwayat_diagnosa.index');
                case 2: // orangduduk
                    return redirect()->route('pakar.basis_pengetahuan.index');
                case 3: // member
                    return redirect()->route('pasien.diagnosa_index');
                default:
                    Auth::logout();
                    return redirect('/login')->withErrors(['role' => 'Role tidak dikenali']);
            }
        }
    
        return back()->withErrors([
            'loginError' => 'Email atau password salah.',
        ])->withInput();
    }
    

    public function showLoginForm()
    {
        if (Auth::check()) {
            $roleId = Auth::user()->role_id;

            switch ($roleId) {
                case 1: // atmint
                    return redirect()->route('admin.riwayat_diagnosa.index');
                case 2: // orangberdiri
                    return redirect()->route('pakar.basis_pengetahuan.index');
                case 3: // member
                    return redirect()->route('pasien.diagnosa_index');
                default:
                    Auth::logout();
                    return redirect('/login')->withErrors(['role' => 'Role tidak dikenali']);
            }
        }

        return view('login.loginpage');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function showRegister()
{
    return view('login.register');
}

public function processRegister(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role_id' => 3, 
    ]);

    Notifikasi::create([
        'tipe' => 'registrasi',
        'pesan' => "Pasien baru Mendaftar: {$user->name}",
        'dibaca' => false,
        'target_role' => 1,
        'dibuat_oleh' => $user->id,
    ]);    

    return redirect()->route('login')->with('success', 'Akun berhasil dibuat!');
}

}
