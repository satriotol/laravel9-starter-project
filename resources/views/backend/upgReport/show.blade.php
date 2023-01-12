@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Laporan UPG</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('upgReport.index') }}">Laporan UPG</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan UPG Form</li>
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
                                        <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                            href="#collapseFour" aria-expanded="false">DETAIL PELAPOR</a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse show" role="tabpanel"
                                    aria-expanded="false">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <th>Nama</th>
                                                <td>{{ $upgReport->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor HP</th>
                                                <td>{{ $upgReport->user->user_detail->phone ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $upgReport->user->email ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{ $upgReport->user->user_detail->address ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jabatan</th>
                                                <td>{{ $upgReport->user->user_detail->jabatan ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Instansi</th>
                                                <td>{{ $upgReport->user->user_detail->instansi ?? '-' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading1 ">
                                    <h4 class="panel-title1">
                                        <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                            href="#collapseFour" aria-expanded="false">IDENTITAS
                                            PEMBERI</a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse show" role="tabpanel"
                                    aria-expanded="false">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td>{{ $upgReport->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>{{ $upgReport->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jabatan</td>
                                                <td>{{ $upgReport->jabatan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Instansi</td>
                                                <td>{{ $upgReport->instansi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Handphone</td>
                                                <td>{{ $upgReport->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Hubungan Dengan Pemberi</td>
                                                <td>{{ $upgReport->hubungan_dengan_pemberi }}</td>
                                            </tr>
                                        </table>
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
                                <div id="collapseFive" class="panel-collapse collapse show" role="tabpanel"
                                    aria-expanded="false">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>Tanggal & Waktu Pemberian</td>
                                                <td>{{ $upgReport->datetime_gratifikasi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat/Lokasi</td>
                                                <td>{{ $upgReport->address_gratifikasi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kategori</td>
                                                <td>{{ $upgReport->upg_category->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Uraian Jenis Gratifikasi</td>
                                                <td>{{ $upgReport->uraian_jenis_gratifikasi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Gratifikasi</td>
                                                <td>{{ $upgReport->nilai_gratifikasi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alasan Pemberian</td>
                                                <td>{{ $upgReport->alasan_pemberian }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kronologi Pemberian</td>
                                                <td>{{ $upgReport->kronologi_pemberian }}</td>
                                            </tr>
                                            <tr>
                                                <td>File Lampiran</td>
                                                <td>
                                                    @isset($upgReport->file)
                                                        <a href="{{ asset('uploads/' . $upgReport->file) }}" target="_blank"
                                                            class="btn btn-primary">Buka Lampiran</a>
                                                    @endisset
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>

                                                    @if (Auth::user()->user_detail)
                                                        <span class="badge bg-{{ $upgReport->getStatus()['color'] }}">
                                                            {{ $upgReport->getStatus()['name'] }}
                                                        </span>
                                                    @else
                                                        <select name="status" class="form-control" required id="">
                                                            @foreach ($statuses as $status)
                                                                <option value="{{ $status }}"
                                                                    @selected($status == $upgReport->status)>
                                                                    {{ $status }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Response</td>
                                                <td>
                                                    @if (Auth::user()->user_detail)
                                                        {{ $upgReport->getResponse() }}
                                                    @else
                                                        <textarea name="response" class="form-control" id="" cols="30" rows="10">{{ $upgReport->response }}</textarea>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a class="btn btn-warning" href="{{ route('upgReport.index') }}">Kembali</a>
                            @unlessrole('USER')
                                <button class="btn btn-primary" type="submit">Submit</button>
                            @endunlessrole
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
