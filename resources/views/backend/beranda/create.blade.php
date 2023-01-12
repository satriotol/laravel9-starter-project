@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Beranda</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Beranda Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Beranda</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($beranda) {{ route('beranda.update', $beranda->id) }} @endisset @empty($beranda) {{ route('beranda.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($beranda)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Teks Sambutan</label>
                            <textarea name="sambutan" class="form-control summernote" id="" required cols="30" rows="10">{{ isset($beranda) ? $beranda->sambutan : @old('sambutan') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Link Video</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($beranda) ? $beranda->video_url : @old('url') }}" name="video_url">
                        </div>
                        <div class="form-group">
                            <label>Thumbnail Video</label>
                            <input type="file" @empty($beranda) required @endempty accept="image/*"
                                class="form-control" name="thumbnail_video">
                            <small class="text-red">Ukuran Rekomendasi 570x314</small>
                        </div>
                        @isset($beranda)
                            <img src="{{ asset('uploads/' . $beranda->thumbnail_video) }}" class="img-thumbnail" alt="">
                        @endisset
                        <div class="text-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
@endpush
