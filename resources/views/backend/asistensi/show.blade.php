@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Asistensi</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('asistensi.index') }}">Asistensi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Asistensi Form</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Asistensi</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($asistensi) {{ route('asistensi.update', $asistensi->id) }} @endisset @empty($asistensi) {{ route('asistensi.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($asistensi)
                            @method('PUT')
                        @endisset

                        <div class="panel-group1" id="accordion1">
                            <div class="panel panel-default mb-4">
                                <div class="panel-heading1 ">
                                    <h4 class="panel-title1">
                                        <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                            href="#collapseFour" aria-expanded="false">DETAIL PENGAJUAN</a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse show" role="tabpanel"
                                    aria-expanded="false">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <th>Nama</th>
                                                <td>{{ $asistensi->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor HP</th>
                                                <td>{{ $asistensi->user->user_detail->phone ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $asistensi->user->email ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{ $asistensi->user->user_detail->address ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jabatan</th>
                                                <td>{{ $asistensi->user->user_detail->jabatan ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Instansi</th>
                                                <td>{{ $asistensi->user->user_detail->instansi ?? '-' }}</td>
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
                                            aria-expanded="false">Detail</a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse show" role="tabpanel"
                                    aria-expanded="false">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>Tanggal & Waktu Pertemuan</td>
                                                <td>{{ $asistensi->waktu_pertemuan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Deskripsi Permasalahan</td>
                                                <td>{{ $asistensi->description_permasalahan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kategori</td>
                                                <td>{{ $asistensi->konsultasi_asistensi_category->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>File Lampiran</td>
                                                <td>
                                                    @isset($asistensi->file)
                                                        <a href="{{ asset('uploads/' . $asistensi->file) }}" target="_blank"
                                                            class="btn btn-primary">Buka Lampiran</a>
                                                    @endisset
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Deskripsi File</td>
                                                <td>{{ $asistensi->description_file ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>

                                                    @if (Auth::user()->user_detail)
                                                        <span class="badge bg-{{ $asistensi->getStatus()['color'] }}">
                                                            {{ $asistensi->getStatus()['name'] }}
                                                        </span>
                                                    @else
                                                        <select name="status" class="form-control" required id="">
                                                            @foreach ($statuses as $status)
                                                                <option value="{{ $status }}"
                                                                    @selected($status == $asistensi->status)>
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
                                                        {{ $asistensi->getResponse() }}
                                                    @else
                                                        <textarea name="response" class="form-control" id="" cols="30" rows="10">{{ $asistensi->response }}</textarea>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a class="btn btn-warning" href="{{ route('asistensi.index') }}">Kembali</a>
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
