<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifikasi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check() && Auth::user()->role_id == 1) {  // hanya admin
        
                $adminId = Auth::id();
        
                // Notifikasi yang dibuat oleh pakar (role 2) atau user lain
                $notifikasi = Notifikasi::where('dibuat_oleh', '!=', $adminId)
                                        ->where('target_role', 1)  // khusus untuk admin
                                        ->latest()
                                        ->take(5)
                                        ->get();
        
                $belumDibaca = Notifikasi::where('dibaca', false)
                                         ->where('dibuat_oleh', '!=', $adminId)
                                         ->where('target_role', 1)
                                         ->count();
        
                $view->with(compact('notifikasi', 'belumDibaca'));
            }
        });
    }
}
