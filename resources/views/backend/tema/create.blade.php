@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Tema</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('tema.index') }}">Tema</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tema Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Tema</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($tema) {{ route('tema.update', $tema->id) }} @endisset @empty($tema) {{ route('tema.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($tema)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($tema) ? $tema->name : @old('name') }}" name="name">
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
