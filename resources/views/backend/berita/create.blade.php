@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Berita</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">Berita Tabel</li>
            </ol>
        </div>
    </div>
    <form
        action="@isset($beritum) {{ route('berita.update', $beritum->id) }} @endisset @empty($beritum) {{ route('berita.store') }} @endempty"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($beritum)
            @method('PUT')
        @endisset
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Berita</h3>
                    </div>
                    <div class="card-body">
                        @include('partials.errors')
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" required class="form-control"
                                value="{{ isset($beritum) ? $beritum->title : @old('title') }}" name="title">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="berita_category_id" class="form-control select2-show-search form-select" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($beritaCategories as $beritaCategory)
                                    <option value="{{ $beritaCategory->id }}"
                                        @isset($beritum)
                                        @selected($beritaCategory->id == $beritum->berita_category_id)
                                        @endisset>
                                        {{ $beritaCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="summernote" cols="30" rows="10" name="description">{{ isset($beritum) ? $beritum->description : @old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Singkat</label>
                            <textarea cols="30" rows="10" maxlength="100" class="form-control" id="myTextArea" name="short_description">{{ isset($beritum) ? $beritum->short_description : @old('short_description') }}</textarea>
                            <p>Total Karakter: <span id="charCount">0/100</span></p>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" accept="image/*" class="form-control upload-image"
                                @empty($beritum)
                                required
                                @endempty
                                name="image">
                        </div>

                        @isset($beritum)
                            <img src="{{ asset('uploads/' . $beritum->image) }}" style="height: 100px" class="img-thumbnail"
                                alt="">
                        @endisset

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Galleri</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Galeri</label>
                            <input type="file" accept="image/*" class="form-control" name="images[]" multiple>
                        </div>
                        @isset($beritum)
                            <table id="example2" class="table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($beritum->berita_galleries as $berita_gallery)
                                        <tr>
                                            <td><img src="{{ asset('uploads/' . $berita_gallery->image) }}"
                                                    style="height: 100px" alt=""></td>
                                            <td>
                                                <a href="{{ route('beritaGallery.destroy', $berita_gallery->id) }}"
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">File Pendukung</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nameFile">
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" class="form-control upload-file" name="file">
                        </div>
                        @isset($beritum)
                            <table id="example2" class="table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <th>Name</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($beritum->berita_files as $berita_file)
                                        <tr>
                                            <td>{{ $berita_file->name }}</td>
                                            <td><a href="{{ asset('uploads/' . $berita_file->file) }}" target="_blank"
                                                    class="btn btn-success">Buka
                                                    File</a></td>
                                            <td>
                                                <a href="{{ route('beritaFile.destroy', $berita_file->id) }}"
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
                    <a class="btn btn-warning" href="{{ route('berita.index') }}">Kembali</a>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('custom-scripts')
    <script src="{{ asset('backend_assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/wysiwyag/wysiwyag.js') }}"></script>
    <script>
        // Get a reference to the textarea and span elements
        var textarea = document.getElementById("myTextArea");
        var charCount = document.getElementById("charCount");

        // Set the initial character count
        charCount.textContent = textarea.value.length;

        // Update the character count when the value of the textarea changes
        textarea.addEventListener("input", function() {
            charCount.textContent = this.value.length;
        });
    </script>
@endpush
