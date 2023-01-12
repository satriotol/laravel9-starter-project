@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Asistensi</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('asistensi.index') }}">Asistensi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Asistensi Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Asistensi</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($asistensi) {{ route('asistensi.update', $asistensi->id) }} @endisset @empty($asistensi) {{ route('asistensi.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($asistensi)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="konsultasi_asistensi_category_id" class="form-control select2-show-search form-select" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($konsultasi_asistensi_categories as $konsultasi_asistensi_category)
                                    <option value="{{ $konsultasi_asistensi_category->id }}"
                                        @isset($asistensi)
                                        @selected($konsultasi_asistensi_category->id == $asistensi->konsultasi_asistensi_category_id)
                                        @endisset>
                                        {{ $konsultasi_asistensi_category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Waktu Pertemuan</label>
                            <input type="datetime-local" class="form-control"
                                {{ isset($asistensi) ? $asistensi->waktu_pertemuan : @old('waktu_pertemuan') }} required
                                name="waktu_pertemuan" id="">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Permasalahan</label>
                            <textarea name="description_permasalahan" required
                                {{ isset($asistensi) ? $asistensi->description_permasalahan : @old('description_permasalahan') }} id=""
                                cols="20" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>File Lampiran</label>
                            <input type="file" name="file" class="form-control upload-file" id="">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Permasalahan</label>
                            <textarea name="description_file" {{ isset($asistensi) ? $asistensi->description_file : @old('description_file') }}
                                id="" cols="20" rows="5" class="form-control"></textarea>
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
