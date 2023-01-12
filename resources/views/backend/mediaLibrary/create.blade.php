@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Media Library</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('mediaLibrary.index') }}">Media Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Media Library Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Media Library</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($mediaLibrary) {{ route('mediaLibrary.update', $mediaLibrary->id) }} @endisset @empty($mediaLibrary) {{ route('mediaLibrary.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($mediaLibrary)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control"
                                value="{{ isset($mediaLibrary) ? $mediaLibrary->name : @old('name') }}" name="name">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="images[]" accept="image/*" multiple
                                class="form-control upload-images"
                                @empty($mediaLibrary)
                            required
                            @endempty>
                        </div>
                        @isset($mediaLibrary)
                            <img src="{{ asset('uploads/' . $mediaLibrary->image) }}" class="img-thumbnail" alt="">
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
