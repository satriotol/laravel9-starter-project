@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Permohonan Informasi</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('permohonanInformasi.index') }}">Permohonan Informasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permohonan Informasi Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Permohonan Informasi</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($permohonanInformasi) {{ route('permohonanInformasi.update', $permohonanInformasi->id) }} @endisset @empty($permohonanInformasi) {{ route('permohonanInformasi.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($permohonanInformasi)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Jenis Informasi</label>
                            <textarea name="jenis_informasi" required id="" cols="20" rows="5" class="form-control">{{ isset($permohonanInformasi) ? $permohonanInformasi->jenis_informasi : @old('jenis_informasi') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Alasan Permohonan</label>
                            <textarea name="alasan_permohonan" required id="" cols="20" rows="5" class="form-control">{{ isset($permohonanInformasi) ? $permohonanInformasi->alasan_permohonan : @old('alasan_permohonan') }}</textarea>
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
