@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Dasar Hukum PPID</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ppidDasarHukum.index') }}">Dasar Hukum PPID</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel Dasar Hukum PPID</li>
            </ol>
        </div>
    </div>

    <form
        action="@isset($ppidDasarHukums) {{ route('ppidDasarHukum.update', $ppidDasarHukums->id) }} @endisset @empty($ppidDasarHukums) {{ route('ppidDasarHukum.store') }} @endempty"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($ppidDasarHukums)
            @method('PUT')
        @endisset
        @include('partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Dasar Hukum PPID</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" accept="image/*" class="form-control" name="image">
                            <small class="text-red">Ukuran Rekomendasi 1170x570</small> <br>
                            @isset($ppidDasarHukums->image)
                                <img src="{{ asset('uploads/' . $ppidDasarHukums->image) }}" style="height: 100px"
                                    class="img-thumbnail" alt="">
                                <a href="{{ route('ppidDasarHukum.destroyImage', $ppidDasarHukums->id) }}"
                                    onclick="return confirm('Are you sure?')">Delete Foto</a>
                            @endisset
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="summernote" name="description">{{ isset($ppidDasarHukums) ? $ppidDasarHukums->description : @old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">File</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="" name="name">
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" accept="application/pdf" class="form-control upload-file"
                                value="{{ isset($ppidDasarHukumFile) ? $ppidDasarHukumFile->file : @old('file') }}"
                                name="file">
                        </div>
                        @isset($ppidDasarHukums)
                            <table id="example2" class="table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <th>Nama</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($ppidDasarHukums->PPIDDasarHukumFile as $ppidDasarHukum)
                                        <tr>
                                            <td>{{ $ppidDasarHukum->name }}</td>
                                            <td> <a href="#"
                                                    onclick="window.open('{{ asset('uploads/' . $ppidDasarHukum->file) }}','_blank')"
                                                    class="btn btn-sm btn-info">view</a></td>
                                            <td>
                                                <a href="{{ route('ppidDasarHukumFile.destroy', $ppidDasarHukum->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endisset
                    </div>
                </div>
                <div class="text-end">
                    <a class="btn btn-warning" href="{{ route('beritaCategory.index') }}">Kembali</a>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('custom-scripts')
    <script src="{{ asset('backend_assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/wysiwyag/wysiwyag.js') }}"></script>
@endpush
