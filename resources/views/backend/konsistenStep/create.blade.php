@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Tata Cara Pengaduan Konsisten</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('konsistenStep.index') }}">Tata Cara Pengaduan Konsisten</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tata Cara Pengaduan Konsisten Form</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Tata Cara Pengaduan Konsisten</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($konsistenStep) {{ route('konsistenStep.update', $konsistenStep->id) }} @endisset @empty($konsistenStep) {{ route('konsistenStep.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($konsistenStep)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Nomor Urut</label>
                            <input type="number" class="form-control"
                                value="{{ isset($konsistenStep) ? $konsistenStep->number : @old('number') }}" required name="number">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="summernote" cols="30" rows="10" name="description">{{ isset($konsistenStep) ? $konsistenStep->description : @old('description') }}</textarea>
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
