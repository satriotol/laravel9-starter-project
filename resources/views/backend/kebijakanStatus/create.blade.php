@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Kebijakan Status</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('kebijakanStatus.index') }}">Kebijakan Status</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kebijakan Status Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Kebijakan Status</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($kebijakanStatus) {{ route('kebijakanStatus.update', $kebijakanStatus->id) }} @endisset @empty($kebijakanStatus) {{ route('kebijakanStatus.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($kebijakanStatus)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control"
                                value="{{ isset($kebijakanStatus) ? $kebijakanStatus->name : @old('name') }}"
                                name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Kode Warna</label>
                            <input type="color" class="form-control col-sm-1"
                                value="{{ isset($kebijakanStatus) ? $kebijakanStatus->color : @old('color') }}"
                                name="color" required>
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
