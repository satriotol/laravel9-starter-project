@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Profil PPID</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ppidProfile.index') }}">Profil PPID</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil PPID Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Profil PPID</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($ppidProfile) {{ route('ppidProfile.update', $ppidProfile->id) }} @endisset @empty($ppidProfile) {{ route('ppidProfile.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($ppidProfile)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="summernote" name="description" class="form-control" id="" required cols="30" rows="10">{{ isset($ppidProfile) ? $ppidProfile->description : @old('description') }}</textarea>
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

@push('custom-scripts')
@endpush
