@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Link</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('link.index') }}">Link</a></li>
                <li class="breadcrumb-item active" aria-current="page">Link Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Link</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($link) {{ route('link.update', $link->id) }} @endisset @empty($link) {{ route('link.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($link)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($link) ? $link->name : @old('name') }}" name="name">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Url</label>
                                    <input type="text" class="form-control" required
                                        value="{{ isset($link) ? $link->url : @old('url') }}" name="url">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Whatsapp Url</label>
                                    <input type="text" class="form-control"
                                        value="{{ isset($link) ? $link->whatsapp_url : @old('whatsapp_url') }}"
                                        name="whatsapp_url">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Google Form Url</label>
                                    <input type="text" class="form-control"
                                        value="{{ isset($link) ? $link->google_form_url : @old('google_form_url') }}"
                                        name="google_form_url">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <li class="list-group-item">
                                Pengaduan
                                <div class="material-switch pull-right">
                                    <input id="someSwitchOptionPrimary" name="is_pengaduan" value="1"
                                        @isset($link) {{ $link->is_pengaduan == 1 ? ' checked' : '' }} @endisset
                                        type="checkbox" />
                                    <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                </div>
                            </li>
                        </div>

                        <div class="form-group">
                            <label>Pengaduan Url</label>
                            <input type="text" class="form-control"
                                value="{{ isset($link) ? $link->pengaduan_link : @old('pengaduan_link') }}"
                                name="pengaduan_link">
                        </div>
                        <div class="form-group">
                            <li class="list-group-item">
                                Layanan Utama
                                <div class="material-switch pull-right">
                                    <input id="someSwitchOptionPrimary1" name="is_layanan_utama" value="1"
                                        @isset($link) {{ $link->is_layanan_utama == 1 ? ' checked' : '' }} @endisset
                                        type="checkbox" />
                                    <label for="someSwitchOptionPrimary1" class="label-primary"></label>
                                </div>
                            </li>
                        </div>
                        <div class="form-group">
                            <li class="list-group-item">
                                Link Terkait
                                <div class="material-switch pull-right">
                                    <input id="someSwitchOptionPrimary2" name="is_terkait" value="1"
                                        @isset($link) {{ $link->is_terkait == 1 ? ' checked' : '' }} @endisset
                                        type="checkbox" />
                                    <label for="someSwitchOptionPrimary2" class="label-primary"></label>
                                </div>
                            </li>
                        </div>
                        <div class="form-group d-none">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control summernote" cols="30" rows="10">{{ isset($link) ? $link->description : @old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Pendek</label>
                            <textarea name="short_description" class="form-control" id="myTextArea" maxlength="100" cols="30" rows="10">{{ isset($link) ? $link->short_description : @old('short_description') }}</textarea>
                            <p>Total Karakter: <span id="charCount">0</span>/150</p>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" accept="image/*" class="form-control" name="image">
                            <small class="text-red">Ukuran Rekomendasi 270x170</small>
                        </div>
                        @isset($link->image)
                            <img src="{{ asset('uploads/' . $link->image) }}" style="height: 100px" class="img-thumbnail"
                                alt="">
                            <a href="{{ route('link.destroyImage', $link->id) }}"
                                onclick="return confirm('Are you sure?')">Delete Foto</a>
                        @endisset
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

@push('custom-scripts')
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
