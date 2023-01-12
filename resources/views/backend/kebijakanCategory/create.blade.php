@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Kebijakan Kategori</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('kebijakanCategory.index') }}">Kebijakan Kategori</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kebijakan Kategori Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Kebijakan Kategori</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($kebijakanCategory) {{ route('kebijakanCategory.update', $kebijakanCategory->id) }} @endisset @empty($kebijakanCategory) {{ route('kebijakanCategory.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($kebijakanCategory)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control"
                                value="{{ isset($kebijakanCategory) ? $kebijakanCategory->name : @old('name') }}"
                                name="name" required>
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
