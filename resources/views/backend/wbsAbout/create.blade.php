@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">WBS About</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('wbsAbout.index') }}">WBS About</a></li>
                <li class="breadcrumb-item active" aria-current="page">WBS About Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form WBS About</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($wbsAbout) {{ route('wbsAbout.update', $wbsAbout->id) }} @endisset @empty($wbsAbout) {{ route('wbsAbout.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($wbsAbout)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="summernote" cols="30" rows="10" name="description">{{ isset($wbsAbout) ? $wbsAbout->description : @old('description') }}</textarea>
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
