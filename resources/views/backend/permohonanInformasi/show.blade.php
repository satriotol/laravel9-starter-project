@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Permohonan Informasi</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('permohonanInformasi.index') }}">Permohonan Informasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permohonan Informasi Form</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Permohonan Informasi</h3>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form
                        action="@isset($permohonanInformasi) {{ route('permohonanInformasi.update', $permohonanInformasi->id) }} @endisset @empty($permohonanInformasi) {{ route('permohonanInformasi.store') }} @endempty"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($permohonanInformasi)
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
                                                <td>{{ $permohonanInformasi->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>{{ $permohonanInformasi->user->user_detail->gender ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor HP</th>
                                                <td>{{ $permohonanInformasi->user->user_detail->phone ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $permohonanInformasi->user->email ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{ $permohonanInformasi->user->user_detail->address ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jabatan</th>
                                                <td>{{ $permohonanInformasi->user->user_detail->jabatan ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Instansi</th>
                                                <td>{{ $permohonanInformasi->user->user_detail->instansi ?? '-' }}</td>
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
                                                <td>Tanggal & Waktu Diajukan</td>
                                                <td>{{ $permohonanInformasi->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Informasi</td>
                                                <td>{{ $permohonanInformasi->jenis_informasi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alasan Permohonan</td>
                                                <td>{{ $permohonanInformasi->alasan_permohonan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>

                                                    @if (Auth::user()->user_detail)
                                                        <span
                                                            class="badge bg-{{ $permohonanInformasi->getStatus()['color'] }}">
                                                            {{ $permohonanInformasi->getStatus()['name'] }}
                                                        </span>
                                                    @else
                                                        <select name="status" class="form-control" required id="">
                                                            @foreach ($statuses as $status)
                                                                <option value="{{ $status }}"
                                                                    @selected($status == $permohonanInformasi->status)>
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
                                                        {{ $permohonanInformasi->getResponse() }}
                                                    @else
                                                        <textarea name="response" class="form-control" id="" cols="30" rows="10">{{ $permohonanInformasi->response }}</textarea>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>File Pengantar Response</td>
                                                <td>
                                                    @isset($permohonanInformasi->response_file)
                                                        <a href="{{ asset('uploads/' . $permohonanInformasi->response_file) }}"
                                                            target="_blank" class="btn btn-primary">Buka Lampiran</a>
                                                    @endisset
                                                    @if (Auth::user()->user_detail == null)
                                                        <input type="file" name="response_file"
                                                            class="form-control upload-file" id="">
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a class="btn btn-warning" href="{{ route('permohonanInformasi.index') }}">Kembali</a>
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
