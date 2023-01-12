@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Laporan WBS</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('wbsReport.index') }}">Laporan WBS</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan WBS Form</li>
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
                                                <td>{{ $wbsReport->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>{{ $wbsReport->user->user_detail->gender ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor HP</th>
                                                <td>{{ $wbsReport->user->user_detail->phone ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $wbsReport->user->email ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{ $wbsReport->user->user_detail->address ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jabatan</th>
                                                <td>{{ $wbsReport->user->user_detail->jabatan ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Instansi</th>
                                                <td>{{ $wbsReport->user->user_detail->instansi ?? '-' }}</td>
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
                                                <th>Jenis Pelanggaran</th>
                                                <td>{{ $wbsReport->wbs_category->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Lokasi</th>
                                                <td>{{ $wbsReport->location }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Kejadian</th>
                                                <td>{{ $wbsReport->datetime }}</td>
                                            </tr>
                                            <tr>
                                                <th>Uraian Kejadian</th>
                                                <td>{{ $wbsReport->description }}</td>
                                            </tr>
                                            <tr>
                                                <th>File</th>
                                                <td><a href="{{ asset('uploads/' . $wbsReport->file) }}" target="_blank"
                                                        class="btn btn-primary">Buka Lampiran</a></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>

                                                    @if (Auth::user()->user_detail)
                                                        <span class="badge bg-{{ $wbsReport->getStatus()['color'] }}">
                                                            {{ $wbsReport->getStatus()['name'] }}
                                                        </span>
                                                    @else
                                                        <select name="status" class="form-control" required id="">
                                                            @foreach ($statuses as $status)
                                                                <option value="{{ $status }}"
                                                                    @selected($status == $wbsReport->status)>
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
                                                        {{ $wbsReport->getResponse() }}
                                                    @else
                                                        <textarea name="response" class="form-control" id="" cols="30" rows="10">{{ $wbsReport->response }}</textarea>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>File Pengantar Response</td>
                                                <td>
                                                    @isset($wbsReport->response_file)
                                                        <a href="{{ asset('uploads/' . $wbsReport->response_file) }}"
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
                            <a class="btn btn-warning" href="{{ route('wbsReport.index') }}">Kembali</a>
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
