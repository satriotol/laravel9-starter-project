@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Type</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('type.index') }}">Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">Type Form</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Type</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($type) {{ route('type.update', $type->id) }} @endisset @empty($type) {{ route('type.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($type)
                            @method('PUT')
                        @endisset
                        <div class="form-group">{!! Form::label('name', 'name') !!}{!! Form::text('name', isset($type) ? $type->name : @old('name'), [
                    'required',
                    'class' => 'form-control',
                    'placeholder' => 'Masukkan name',
                ]) !!}</div>
                        <div class="text-end">
                            <a class="btn btn-warning" href="{{ route('type.index') }}">Kembali</a>
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
