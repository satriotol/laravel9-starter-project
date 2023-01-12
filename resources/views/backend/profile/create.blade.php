@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Profil</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">Profil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil Tabel</li>
            </ol>
        </div>
    </div>
    <form
        action="@isset($profile) {{ route('profile.update', $profile->id) }} @endisset @empty($profile) {{ route('profile.store') }} @endempty"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($profile)
            @method('PUT')
        @endisset
        @include('partials.errors')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Profil</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($profile) ? $profile->name : @old('name') }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Tipe</label>
                            <select name="type" class="form-control" required id="">
                                <option value="">Pilih Tipe</option>
                                @foreach ($types as $type)
                                    <option
                                        @isset($profile)
                                        @selected($profile->type == $type)
                                    @endisset
                                        value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            <small class="text-red">Wajib Diisi Untuk Menentukan Tipe Konten</small>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control"
                                value="{{ isset($profile) ? $profile->link : @old('link') }}" name="link">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="summernote" name="description">{{ isset($profile) ? $profile->description : @old('description') }}</textarea>
                        </div>
                        <div class="text-end">
                            <a class="btn btn-warning" href="{{ route('profile.index') }}">Kembali</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('custom-scripts')
    <script src="{{ asset('backend_assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/wysiwyag/wysiwyag.js') }}"></script>
@endpush
