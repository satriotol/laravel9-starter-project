@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">ProjectUser</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('project_user.index') }}">ProjectUser</a></li>
                <li class="breadcrumb-item active" aria-current="page">ProjectUser Form</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form ProjectUser</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($project_user) {{ route('project_user.update', $project_user->id) }} @endisset @empty($project_user) {{ route('project_user.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($project_user)
                            @method('PUT')
                        @endisset
                        <div class="form-group">{!! Form::label('user_id', 'user_id') !!}{!! Form::text('user_id', isset($project_user) ? $project_user->user_id : @old('user_id'), [
                    'required',
                    'class' => 'form-control',
                    'placeholder' => 'Masukkan user_id',
                ]) !!}</div>
<div class="form-group">{!! Form::label('project_id', 'project_id') !!}{!! Form::text('project_id', isset($project_user) ? $project_user->project_id : @old('project_id'), [
                    'required',
                    'class' => 'form-control',
                    'placeholder' => 'Masukkan project_id',
                ]) !!}</div>
                        <div class="text-end">
                            <a class="btn btn-warning" href="{{ route('project_user.index') }}">Kembali</a>
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
