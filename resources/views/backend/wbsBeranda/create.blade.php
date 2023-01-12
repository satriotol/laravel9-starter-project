@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Whistleblower</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('wbsBeranda.index') }}">Whistleblower</a></li>
                <li class="breadcrumb-item active" aria-current="page">Whistleblower Form</li>
            </ol>
        </div>
    </div>
    <form
        action="@isset($wbsBeranda) {{ route('wbsBeranda.update', $wbsBeranda->id) }} @endisset @empty($wbsBeranda) {{ route('wbsBeranda.store') }} @endempty"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($wbsBeranda)
            @method('PUT')
        @endisset
        @include('partials.errors')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Whistleblower</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="summernote" cols="30" rows="10" name="description">{{ isset($wbsBeranda) ? $wbsBeranda->description : @old('description') }}</textarea>
                        </div>
                        <div class="text-end">
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
