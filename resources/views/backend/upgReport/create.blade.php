@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Laporan UPG</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('upgReport.index') }}">Laporan UPG</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan UPG Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Laporan UPG</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($upgReport) {{ route('upgReport.update', $upgReport->id) }} @endisset @empty($upgReport) {{ route('upgReport.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($upgReport)
                            @method('PUT')
                        @endisset
                        <div class="panel-group1" id="accordion1">
                            <div class="panel panel-default mb-4">
                                <div class="panel-heading1 ">
                                    <h4 class="panel-title1">
                                        <a class="accordion-toggle" data-bs-toggle="collapse"
                                            data-bs-parent="#accordion" href="#collapseFour" aria-expanded="false">IDENTITAS
                                            PEMBERI</a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse show" role="tabpanel"
                                    aria-expanded="false">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="name" required
                                                value="{{ isset($upgReport) ? $upgReport->name : @old('name') }}"
                                                id="">
                                            <small>Tuliskan nama lengkap yang memberi gratifikasi</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" class="form-control" name="address" required
                                                value="{{ isset($upgReport) ? $upgReport->address : @old('address') }}"
                                                id="">
                                            <small>Tuliskan alamat pemberi gratifikasi</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jabatan</label>
                                            <input type="text" class="form-control" name="jabatan"
                                                value="{{ isset($upgReport) ? $upgReport->jabatan : @old('jabatan') }}"
                                                required id="">
                                            <small>Tuliskan alamat jabatan gratifikasi</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Instansi</label>
                                            <input type="text" class="form-control" name="instansi"
                                                value="{{ isset($upgReport) ? $upgReport->instansi : @old('instansi') }}"
                                                required id="">
                                            <small>Tuliskan alamat instansi gratifikasi</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomor HP</label>
                                            <input type="number" class="form-control" name="phone"
                                                value="{{ isset($upgReport) ? $upgReport->phone : @old('phone') }}" required
                                                id="">
                                            <small>Tuliskan nomor handphone pemberi gratifikasi yang aktif. Contoh:
                                                0813xxxxx</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hubungan Dengan Pemberi</label>
                                            <input type="number" class="form-control" name="hubungan_dengan_pemberi"
                                                value="{{ isset($upgReport) ? $upgReport->hubungan_dengan_pemberi : @old('hubungan_dengan_pemberi') }}"
                                                required id="">
                                            <small>Tuliskan hubungan Anda dengan pemberi gratifikasi. Contoh: Rekan kerja
                                                proyek gorong-gorong</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading1">
                                    <h4 class="panel-title1">
                                        <a class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                            data-bs-parent="#accordion" href="#collapseFive"
                                            aria-expanded="false">KRONOLOGI</a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                                    aria-expanded="false">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>Tanggal & Waktu Pemberian</label>
                                            <input type="datetime-local" class="form-control"
                                                {{ isset($upgReport) ? $upgReport->datetime_gratifikasi : @old('datetime_gratifikasi') }}
                                                required name="datetime_gratifikasi" id="">
                                            <small>Tuliskan tanggal pemberian gratifikasi</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tempat/Lokasi</label>
                                            <input type="text" class="form-control" name="address_gratifikasi"
                                                value="{{ isset($upgReport) ? $upgReport->address_gratifikasi : @old('address_gratifikasi') }}"
                                                required id="">
                                            <small>Tuliskan tempat atau lokasi pemberian gratifikasi secara spesifik.
                                                Contoh: Rumah Penerima, Sidoarum, Godean, Sleman, DIY</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select name="upg_category_id"
                                                class="form-control select2-show-search form-select" required>
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($upgCategories as $upgCategory)
                                                    <option value="{{ $upgCategory->id }}"
                                                        @isset($upgReport)
                                                        @selected($upgCategory->id == $upgReport->upg_category_id)
                                                        @endisset>
                                                        {{ $upgCategory->name }}</option>
                                                @endforeach
                                            </select>
                                            <small>Tuliskan fasilitas lainnya jika tidak termasuk pada pilihan di bawah
                                                ini</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Uraian Jenis Gratifikasi</label>
                                            <input type="text" class="form-control" name="uraian_jenis_gratifikasi"
                                                value="{{ isset($upgReport) ? $upgReport->uraian_jenis_gratifikasi : @old('uraian_jenis_gratifikasi') }}"
                                                required id="">
                                            <small>Tuliskan bentuk dari jenis gratifikasi. Jika berupa uang, tuliskan 0.
                                                Contoh: Jika jenis gratifikasi adalah vocher diskon, uraiannya adalah vocher
                                                diskon tas Louis Vuitton.
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Gratifikasi</label>
                                            <input type="text" class="form-control" name="nilai_gratifikasi"
                                                value="{{ isset($upgReport) ? $upgReport->nilai_gratifikasi : @old('nilai_gratifikasi') }}"
                                                required id="">
                                            <small>Sebutkan nilai perkiraan gratifikasi jika gratifikasi yang diterima bukan
                                                berupa uang. Ditulis jangan menggunakan tanda baca apapun. Contoh: 500000
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alasan Pemberian</label>
                                            <input type="text" class="form-control" name="alasan_pemberian"
                                                value="{{ isset($upgReport) ? $upgReport->alasan_pemberian : @old('alasan_pemberian') }}"
                                                required id="">
                                            <small>Tuliskan alasan pemberian gratifikasi
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kronologi Pemberian</label>
                                            <input type="text" class="form-control" name="kronologi_pemberian"
                                                value="{{ isset($upgReport) ? $upgReport->kronologi_pemberian : @old('kronologi_pemberian') }}"
                                                required id="">
                                            <small>Ceritakan kronologi pemberian gratifikasi secara jujur
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <label>File Lampiran</label>
                                            <input type="file" name="file" class="form-control upload-file"
                                                id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
