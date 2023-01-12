@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Kategori WBS</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('wbsCategory.index') }}">Kategori WBS</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kategori WBS Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Kategori WBS</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($wbsCategory) {{ route('wbsCategory.update', $wbsCategory->id) }} @endisset @empty($wbsCategory) {{ route('wbsCategory.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($wbsCategory)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($wbsCategory) ? $wbsCategory->name : @old('name') }}" name="name">
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
