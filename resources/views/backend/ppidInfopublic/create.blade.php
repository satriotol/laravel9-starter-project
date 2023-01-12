@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Informasi Publik</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ppidInfopublic.index') }}">Informasi Publik</a></li>
                <li class="breadcrumb-item active" aria-current="page">Informasi Publik Tabel</li>
            </ol>
        </div>
    </div>
    <form
        action="@isset($ppidInfopublic) {{ route('ppidInfopublic.update', $ppidInfopublic->id) }} @endisset @empty($ppidInfopublic) {{ route('ppidInfopublic.store') }} @endempty"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($ppidInfopublic)
            @method('PUT')
        @endisset
        @include('partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Informasi Publik</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($ppidInfopublic) ? $ppidInfopublic->name : @old('name') }}" name="name">
                        </div>

                        {{--                    ini nanti dibuat dropdown  --}}
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category" required class="form-control select2-show-search">
                                <option value="1" @isset($ppidInfopublic) @selected($ppidInfopublic->category == 1) @endisset>Informasi Berkala</option>
                                <option value="2" @isset($ppidInfopublic) @selected($ppidInfopublic->category == 2) @endisset>Informasi Setiap Saat</option>
                                <option value="3" @isset($ppidInfopublic) @selected($ppidInfopublic->category == 3) @endisset>Informasi Dikecualikan</option>
                                <option value="4" @isset($ppidInfopublic) @selected($ppidInfopublic->category == 4) @endisset>Informasi Serta Merta</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sub Kategori</label>
                            <select name="ppid_infopublic_subcategory_id" required class="form-control select2-show-search">
                                <option value="">Pilih SubKategori</option>
                                @foreach ($ppidInfopublicSubcategories as $ppidInfopublicSubcategory)
                                    <option
                                        @isset($ppidInfopublic) @selected($ppidInfopublicSubcategory->id == $ppidInfopublic->ppid_infopublic_subcategory_id) @endisset
                                        value="{{ $ppidInfopublicSubcategory->id }}">
                                        {{ $ppidInfopublicSubcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="nameDetail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" class="form-control upload-file" name="file">
                        </div>
                        @isset($ppidInfopublic)
                            <table id="example2" class="table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($ppidInfopublic->PpidInfopublicFiles as $PpidInfopublicsFile)
                                        <tr>
                                            <td><a href="{{ asset('uploads/' . $PpidInfopublicsFile->file) }}"
                                                    target="_blank">{{ $PpidInfopublicsFile->name }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('ppidInfopublicFile.destroy', $PpidInfopublicsFile->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endisset
                    </div>
                </div>
                <div class="text-end">
                    <a class="btn btn-warning" href="{{ route('ppidInfopublic.index') }}">Kembali</a>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('custom-scripts')
    <script src="{{ asset('backend_assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/wysiwyag/wysiwyag.js') }}"></script>
@endpush
