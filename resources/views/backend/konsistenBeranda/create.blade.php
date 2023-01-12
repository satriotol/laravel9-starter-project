@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Konsisten Beranda</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('konsistenBeranda.index') }}">Konsisten Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Konsisten Beranda Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Konsisten Beranda</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($konsistenBeranda) {{ route('konsistenBeranda.update', $konsistenBeranda->id) }} @endisset @empty($konsistenBeranda) {{ route('konsistenBeranda.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($konsistenBeranda)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Tentang</label>
                            <textarea class="summernote" cols="30" rows="10" name="about">{{ isset($konsistenBeranda) ? $konsistenBeranda->about : @old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="summernote" cols="30" rows="10" name="description">{{ isset($konsistenBeranda) ? $konsistenBeranda->description : @old('description') }}</textarea>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
