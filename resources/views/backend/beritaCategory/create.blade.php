@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Kategori Berita</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beritaCategory.index') }}">Kategori Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kategori Berita Tabel</li>
            </ol>
        </div>
    </div>
    <form
        action="@isset($beritaCategory) {{ route('beritaCategory.update', $beritaCategory->id) }} @endisset @empty($beritaCategory) {{ route('beritaCategory.store') }} @endempty"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($beritaCategory)
            @method('PUT')
        @endisset
        @include('partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Kategori Berita</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($beritaCategory) ? $beritaCategory->name : @old('name') }}" name="name">
                        </div>
                        <div class="form-group">
                            <li class="list-group-item">
                                Kegiatan
                                <div class="material-switch pull-right">
                                    <input id="someSwitchOptionPrimary" name="is_kegiatan" value="1"
                                        @isset($beritaCategory) {{ $beritaCategory->is_kegiatan == 1 ? ' checked' : '' }} @endisset
                                        type="checkbox" />
                                    <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                </div>
                            </li>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="summernote" name="description">{{ isset($beritaCategory) ? $beritaCategory->description : @old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" accept="image/*" class="form-control upload-logo" name="logo">
                        </div>
                        @isset($beritaCategory->logo)
                            <img src="{{ asset('uploads/' . $beritaCategory->logo) }}" style="height: 100px"
                                class="img-thumbnail" alt="">
                            <a href="{{ route('beritaCategory.destroyLogo', $beritaCategory->id) }}"
                                onclick="return confirm('Are you sure?')">Delete Foto</a>
                        @endisset
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" accept="image/*" class="form-control" name="image">
                        </div>
                        @isset($beritaCategory->image)
                            <img src="{{ asset('uploads/' . $beritaCategory->image) }}" style="height: 100px"
                                class="img-thumbnail" alt="">
                            <a href="{{ route('beritaCategory.destroyImage', $beritaCategory->id) }}"
                                onclick="return confirm('Are you sure?')">Delete Foto</a>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Galleri</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Galeri</label>
                            <input type="file" accept="image/*" class="form-control upload-images" name="images[]"
                                multiple>
                        </div>
                        @isset($beritaCategory)
                            <table id="example2" class="table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($beritaCategory->berita_category_galleries as $berita_category_gallery)
                                        <tr>
                                            <td><img src="{{ asset('uploads/' . $berita_category_gallery->image) }}"
                                                    style="height: 100px" alt=""></td>
                                            <td>
                                                <a href="{{ route('beritaCategoryGallery.destroy', $berita_category_gallery->id) }}"
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
                    <a class="btn btn-warning" href="{{ route('beritaCategory.index') }}">Kembali</a>
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
