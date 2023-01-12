@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Layanan Informasi</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ppidLayananInformasi.index') }}">Layanan Informasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Layanan Informasi Tabel</li>
            </ol>
        </div>
    </div>
    <form
        action="@isset($ppidLayananInformasi) {{ route('ppidLayananInformasi.update', $ppidLayananInformasi->id) }} @endisset @empty($ppidLayananInformasi) {{ route('ppidLayananInformasi.store') }} @endempty"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($ppidLayananInformasi)
            @method('PUT')
        @endisset
        @include('partials.errors')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Layanan Informasi</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" required
                                value="{{ isset($ppidLayananInformasi) ? $ppidLayananInformasi->name : @old('name') }}"
                                name="name">
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Tipe</label>
                            <select name="type" class="form-control" required id="">
                                <option value="">Pilih Tipe</option>
                                @foreach ($types as $type)
                                    <option
                                        @isset($ppidLayananInformasi)
                                        @selected($ppidLayananInformasi->type == $type)
                                    @endisset
                                        value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            <small class="text-red">Wajib Diisi Untuk Menentukan Tipe Konten</small>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control"
                                value="{{ isset($ppidLayananInformasi) ? $ppidLayananInformasi->link : @old('link') }}"
                                name="link">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="summernote" name="description">{{ isset($ppidLayananInformasi) ? $ppidLayananInformasi->description : @old('description') }}</textarea>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Icon</label>
                            <input type="file" accept="image/*" class="form-control upload-icon" name="icon">
                        </div> --}}
                        {{-- <small class="text-red">Ukuran Rekomendasi 500x500</small>
                        @isset($ppidLayananInformasi->icon)
                            <br>
                            <img src="{{ asset('uploads/' . $ppidLayananInformasi->icon) }}" style="height: 100px"
                                class="img-thumbnail" alt="">
                            <a href="{{ route('ppidLayananInformasi.destroyIcon', $ppidLayananInformasi->id) }}"
                                onclick="return confirm('Are you sure?')">Delete</a>
                        @endisset --}}
                        @isset($ppidLayananInformasi->image)
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" accept="image/*" class="form-control" name="image">
                        </div>
                        {{-- @isset($ppidLayananInformasi->image) --}}
                            <img src="{{ asset('uploads/' . $ppidLayananInformasi->image) }}" style="height: 100px"
                                class="img-thumbnail" alt="">
                        @endisset
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
                        @isset($ppidLayananInformasi)
                            <table id="example2" class="table table-bordered text-nowrap border-bottom">
                                <thead>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($ppidLayananInformasi->ppid_layanan_informasi_details as $ppid_layanan_informasi_detail)
                                        <tr>
                                            <td><a href="{{ asset('uploads/' . $ppid_layanan_informasi_detail->file) }}"
                                                    target="_blank">{{ $ppid_layanan_informasi_detail->name }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('ppidLayananInformasiDetail.destroy', $ppid_layanan_informasi_detail->id) }}"
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
                    <a class="btn btn-warning" href="{{ route('ppidLayananInformasi.index') }}">Kembali</a>
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
