@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">PPID Dasar Hukum Files</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ppidDasarHukumFile.index') }}">PPID Dasar Hukum Files</a></li>
                <li class="breadcrumb-item active" aria-current="page">PPID Dasar Hukum Files Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form PPID Dasar Hukum Files</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($ppidDasarHukumFile) {{ route('ppidDasarHukumFile.update', $ppidDasarHukumFile->id) }} @endisset @empty($ppidDasarHukumFile) {{ route('ppidDasarHukumFile.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($ppidDasarHukumFile)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($ppidDasarHukumFile) ? $ppidDasarHukumFile->name : @old('name') }}" name="name">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="ppid_dasar_hukum_id" required class="form-control select2-show-search">
                                        <option value="">Pilih Dasar Hukum</option>
                                        @foreach ($PPIDDasarHukums as $PPIDDasarHukum)
                                            <option
                                                @isset($ppidDasarHukumFile) @selected($PPIDDasarHukum->id == $ppidDasarHukumFile->ppid_dasar_hukum_id) @endisset
                                                value="{{ $PPIDDasarHukum->id }}">
                                                {{ $PPIDDasarHukum->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>File</label>
                            <input type="file" accept="application/pdf" class="form-control upload-file"
                                @empty($ppidDasarHukumFile)
                            required
                            @endempty
                                value="{{ isset($ppidDasarHukumFile) ? $ppidDasarHukumFile->file : @old('file') }}" name="file">
                        </div>
                        @isset($ppidDasarHukumFile)
                            <iframe src="{{ asset('uploads/' . $ppidDasarHukumFile->file) }}" frameborder="0"></iframe>
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
