@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Kebijakan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('kebijakan.index') }}">Kebijakan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kebijakan Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Kebijakan</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($kebijakan) {{ route('kebijakan.update', $kebijakan->id) }} @endisset @empty($kebijakan) {{ route('kebijakan.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($kebijakan)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($kebijakan) ? $kebijakan->name : @old('name') }}" name="name">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kebijakan_category_id" required class="form-control select2-show-search">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kebijakan_categories as $kebijakan_category)
                                            <option
                                                @isset($kebijakan) @selected($kebijakan_category->id == $kebijakan->kebijakan_category_id) @endisset
                                                value="{{ $kebijakan_category->id }}">
                                                {{ $kebijakan_category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tema</label>
                                    <select name="tema_id[]" required class="form-control select2-show-search" multiple>
                                        @foreach ($temas as $tema)
                                            <option
                                                @isset($kebijakan) @foreach ($kebijakan->kebijakan_temas as $kebijakan_tema) @selected($tema->id == $kebijakan_tema->tema_id) @endforeach @endisset
                                                value="{{ $tema->id }}">
                                                {{ $tema->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Entitas</label>
                            <input type="text" class="form-control"
                                value="{{ isset($kebijakan) ? $kebijakan->entitas : @old('entitas') }}" name="entitas">
                        </div>
                        <div class="form-group">
                            <label>Nomor</label>
                            <input type="text" class="form-control"
                                value="{{ isset($kebijakan) ? $kebijakan->nomor : @old('nomor') }}" name="nomor">
                        </div>
                        <div class="form-group">
                            <label>Sumber</label>
                            <input type="text" class="form-control"
                                value="{{ isset($kebijakan) ? $kebijakan->sumber : @old('sumber') }}" name="sumber">
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="number" class="form-control"
                                value="{{ isset($kebijakan) ? $kebijakan->tahun : @old('tahun') }}" name="tahun">
                        </div>
                        <div class="form-group">
                            <label>Ditetapkan Tanggal</label>
                            <input type="date" class="form-control"
                                value="{{ isset($kebijakan) ? $kebijakan->ditetapkan_tanggal : @old('ditetapkan_tanggal') }}"
                                name="ditetapkan_tanggal">
                        </div>
                        <div class="form-group">
                            <label>Diundangkan Tanggal</label>
                            <input type="date" class="form-control"
                                value="{{ isset($kebijakan) ? $kebijakan->diundangkan_tanggal : @old('diundangkan_tanggal') }}"
                                name="diundangkan_tanggal">
                        </div>
                        <div class="form-group">
                            <label>Berlaku Tanggal</label>
                            <input type="date" class="form-control"
                                value="{{ isset($kebijakan) ? $kebijakan->berlaku_tanggal : @old('berlaku_tanggal') }}"
                                name="berlaku_tanggal">
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="kebijakan_status_id" required class="form-control select2-show-search">
                                    <option value="">Pilih Status</option>
                                    @foreach ($kebijakanStatuses as $kebijakanStatus)
                                        <option
                                            @isset($kebijakan) @selected($kebijakanStatus->id == $kebijakan->kebijakan_status_id) @endisset
                                            value="{{ $kebijakanStatus->id }}">
                                            {{ $kebijakanStatus->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" accept="application/pdf" class="form-control upload-file"
                                @empty($kebijakan)
                            required
                            @endempty
                                value="{{ isset($kebijakan) ? $kebijakan->file : @old('file') }}" name="file">
                        </div>
                        @isset($kebijakan)
                            <iframe src="{{ asset('uploads/' . $kebijakan->file) }}" frameborder="0"></iframe>
                        @endisset
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
