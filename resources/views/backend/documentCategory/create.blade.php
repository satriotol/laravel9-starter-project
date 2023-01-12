@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Kategori Dokumen</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('documentCategory.index') }}">Kategori Dokumen</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kategori Dokumen Tabel</li>
            </ol>
        </div>
    </div>
    @include('partials.errors')
    <form
        action="@isset($documentCategory) {{ route('documentCategory.update', $documentCategory->id) }} @endisset @empty($documentCategory) {{ route('documentCategory.store') }} @endempty"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($documentCategory)
            @method('PUT')
        @endisset
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Kategori Dokumen</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($documentCategory) ? $documentCategory->name : @old('name') }}"
                                name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="description" id="" class="form-control summernote" cols="30" rows="10">{{ isset($documentCategory) ? $documentCategory->description : @old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nameFile">
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" class="form-control upload-file" name="file">
                        </div>
                        @isset($documentCategory)
                            <table id="example2" class="table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <th>Name</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($documentCategory->documents as $document)
                                        <tr>
                                            <td>{{ $document->name }}</td>
                                            <td><a href="{{ asset('uploads/' . $document->file) }}" target="_blank"
                                                    class="btn btn-success">Buka
                                                    File</a></td>
                                            <td>
                                                <a href="{{ route('document.destroy', $document->id) }}"
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
                    <a class="btn btn-warning" href="{{ route('documentCategory.index') }}">Kembali</a>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
