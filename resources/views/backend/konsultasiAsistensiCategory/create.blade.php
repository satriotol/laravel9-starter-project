@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Konsultasi Asistensi Kategori</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('konsultasiAsistensiCategory.index') }}">Konsultasi Asistensi
                        Kategori</a></li>
                <li class="breadcrumb-item active" aria-current="page">Konsultasi Asistensi Kategori Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Konsultasi Asistensi Kategori</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($konsultasiAsistensiCategory) {{ route('konsultasiAsistensiCategory.update', $konsultasiAsistensiCategory->id) }} @endisset @empty($konsultasiAsistensiCategory) {{ route('konsultasiAsistensiCategory.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($konsultasiAsistensiCategory)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($konsultasiAsistensiCategory) ? $konsultasiAsistensiCategory->name : @old('name') }}"
                                name="name">
                        </div>
                        <div class="form-group">
                            <li class="list-group-item">
                                Konsultasi & Asistensi
                                <div class="material-switch pull-right">
                                    <input id="someSwitchOptionPrimary" name="is_konsultasi" value="1"
                                        @isset($konsultasiAsistensiCategory) {{ $konsultasiAsistensiCategory->is_konsultasi == 1 ? ' checked' : '' }} @endisset
                                        type="checkbox" />
                                    <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                </div>
                            </li>
                        </div>
                        <div class="form-group">
                            <li class="list-group-item">
                                Pertemuan
                                <div class="material-switch pull-right">
                                    <input id="someSwitchOptionPrimary2" name="is_pertemuan" value="1"
                                        @isset($konsultasiAsistensiCategory) {{ $konsultasiAsistensiCategory->is_pertemuan == 1 ? ' checked' : '' }} @endisset
                                        type="checkbox" />
                                    <label for="someSwitchOptionPrimary2" class="label-primary"></label>
                                </div>
                            </li>
                        </div>
                        <div class="text-end">
                            <a class="btn btn-warning" href="{{ url()->previous() }}">Kembali</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
