@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Laporan WBS</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('wbsReport.index') }}">Laporan WBS</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan WBS Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Laporan WBS</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($wbsReport) {{ route('wbsReport.update', $wbsReport->id) }} @endisset @empty($wbsReport) {{ route('wbsReport.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($wbsReport)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="wbs_category_id" class="form-control select2-show-search form-select" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($wbsCategories as $wbsCategory)
                                    <option value="{{ $wbsCategory->id }}"
                                        @isset($wbsReport)
                                        @selected($wbsCategory->id == $wbsReport->wbs_category_id)
                                        @endisset>
                                        {{ $wbsCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" required placeholder="Alamat / Lokasi Kejadian"
                                class="form-control"name="location"
                                {{ isset($wbsReport) ? $wbsReport->location : @old('location') }} id="">
                        </div>
                        <div class="form-group">
                            <label>Tanggal & Waktu Kejadian</label>
                            <input type="datetime-local" class="form-control"
                                {{ isset($wbsReport) ? $wbsReport->datetime : @old('datetime') }} required name="datetime"
                                id="">
                        </div>
                        <div class="form-group">
                            <label>Uraian Pengaduan</label>
                            <textarea name="description" {{ isset($wbsReport) ? $wbsReport->description : @old('description') }} id=""
                                cols="20" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>File Lampiran</label>
                            <input type="file" name="file" class="form-control upload-file" id="">
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
