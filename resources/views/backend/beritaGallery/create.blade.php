@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Berita Gallery</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beritaGallery.index') }}">Berita Gallery</a></li>
                <li class="breadcrumb-item active" aria-current="page">Berita Gallery Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Berita Gallery</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($beritaGallery) {{ route('beritaGallery.update', $beritaGallery->id) }} @endisset @empty($beritaGallery) {{ route('beritaGallery.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($beritaGallery)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Berita</label>
                            <input type="text" class="form-control"
                                value="{{ isset($beritaGallery) ? $beritaGallery->name : @old('name') }}" name="name">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" accept="image/*" class="form-control"
                                @empty($beritaGallery)
                            required
                            @endempty
                                name="image">
                        </div>
                        @isset($beritaGallery)
                            <img src="{{ asset('uploads/' . $beritaGallery->image) }}" class="img-thumbnail" alt="">
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
