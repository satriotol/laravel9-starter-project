@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Project</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Project</a></li>
                <li class="breadcrumb-item active" aria-current="page">Project Form</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Project</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($project) {{ route('project.update', $project->id) }} @endisset @empty($project) {{ route('project.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($project)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            {!! Form::label('type_id', 'Tipe Projek') !!}
                            {!! Form::select('type_id', $types, isset($project) ? $project->type_id : @old('type_id'), [
                                'required',
                                'class' => 'form-control select2',
                                'placeholder' => 'Masukkan Tipe Projek',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('user_id', 'Tim') !!}
                            {!! Form::select('user_id[]', $users, isset($project) ? $project->users : @old('user_id'), [
                                'required',
                                'multiple',
                                'class' => 'form-control select2',
                            ]) !!}
                        </div>
                        {{-- <div class="form-group">
                            {!! Form::label('opd_id', 'opd_id') !!}
                            {!! Form::text('opd_id', isset($project) ? $project->opd_id : @old('opd_id'), [
                                'required',
                                'class' => 'form-control',
                                'placeholder' => 'Masukkan opd_id',
                            ]) !!}
                        </div> --}}
                        <div class="form-group">
                            {!! Form::label('name', 'Nama Projek') !!}
                            {!! Form::text('name', isset($project) ? $project->name : @old('name'), [
                                'required',
                                'class' => 'form-control',
                                'placeholder' => 'Masukkan name',
                            ]) !!}</div>
                        <div class="form-group">{!! Form::label('url', 'url') !!}{!! Form::text('url', isset($project) ? $project->url : @old('url'), [
                            'required',
                            'class' => 'form-control',
                            'placeholder' => 'Masukkan url',
                        ]) !!}</div>
                        <div class="form-group">{!! Form::label('start_at', 'start_at') !!}{!! Form::date('start_at', isset($project) ? $project->start_at : @old('start_at'), [
                            'required',
                            'class' => 'form-control',
                            'placeholder' => 'Masukkan start_at',
                        ]) !!}</div>
                        <div class="text-end">
                            <a class="btn btn-warning" href="{{ route('project.index') }}">Kembali</a>
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
