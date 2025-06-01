<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use App\Models\ProgressMahasiswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
    
    
    public function boot(): void
    {
        Paginator::useBootstrap();
        
        Gate::define('admin', function(User $user){
            return $user->is_admin == 1;
        });

        Gate::define('user', function(User $user){
            return $user->is_user == 0;
        });

        Blade::if('sudahSelesai', function ($halaman) {
        $user = auth()->user();
        if (!$user) return false;

        return ProgressMahasiswa::where('user_id', $user->id)
                ->where('halaman', $halaman)
                ->where('selesai', 1)
                ->exists();
        });

        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Makassar'); // atau Asia/Jakarta sesuai lokasi kamu


    }
}
