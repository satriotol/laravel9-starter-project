<?php

namespace App\Providers;

use App\Models\Asistensi;
use App\Models\Konsultasi;
use App\Models\PermohonanInformasi;
use App\Models\Pertemuan;
use App\Models\UpgReport;
use App\Models\WbsReport;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        Schema::defaultStringLength(125);
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            if (Auth::user()) {
                $view->with('totalPendingKonsultasi', Konsultasi::getData()->where('status', 'pending')->get()->count());
                $view->with('totalPendingAsistensi', Asistensi::getData()->where('status', 'pending')->get()->count());
                $view->with('totalPendingPermohonanInformasi', PermohonanInformasi::getData()->where('status', 'pending')->get()->count());
                $view->with('totalPendingWbsReport', WbsReport::getData()->where('status', 'pending')->get()->count());
                $view->with('totalPertemuan', Pertemuan::getData()->where('status', 'pending')->get()->count());
                $view->with('totalUpg', UpgReport::getData()->where('status', 'pending')->get()->count());
            }
        });
    }
}
