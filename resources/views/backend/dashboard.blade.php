@extends('backend_layouts.main')
@section('content')
    @hasrole('USER-CONFIRMATION')
        @include('backend.dashboardUserWaiting')
    @endhasrole
    @unlessrole('USER-CONFIRMATION')
        <div class="page-header">
            <h1 class="page-title">Selamat Datang Di Dashboard Pelayanan Dan Pelaporan Inspektorat</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Permohonan Informasi</h6>
                                <h2 class="mb-0 number-font">{{ $totalPermohonanInformasi }}</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <i class="side-menu__icon fe fe-info"
                                        style="font-size: 4rem; color:var(--primary-bg-color)"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">Konsultasi & Asistensi</h6>
                                <h2 class="mb-0 number-font">{{ $totalAsistensi + $totalKonsultasi }}</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <i class="side-menu__icon fe fe-users"
                                        style="font-size: 4rem; color:var(--primary-bg-color)"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">WBS</h6>
                                <h2 class="mb-0 number-font">{{ $totalWbsReport }}</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <i class="side-menu__icon fe fe-flag"
                                        style="font-size: 4rem; color:var(--primary-bg-color)"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 class="">UPG</h6>
                                <h2 class="mb-0 number-font">{{ $totalUpgReport }}</h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <i class="side-menu__icon fe fe-dollar-sign"
                                        style="font-size: 4rem; color:var(--primary-bg-color)"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endunlessrole
@endsection
@push('custom-scripts')
@endpush
