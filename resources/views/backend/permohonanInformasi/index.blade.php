@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Permohonan Informasi</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('permohonanInformasi.index') }}">Permohonan Informasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permohonan Informasi</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Permohonan Informasi</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('permohonanInformasi.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Laporan Masuk</th>
                                    <th>Status</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permohonanInformasis as $permohonanInformasi)
                                    <tr>
                                        <td>{{ $permohonanInformasi->created_at }}</td>
                                        <td>
                                            <span class="badge bg-{{ $permohonanInformasi->getStatus()['color'] }}">
                                                {{ $permohonanInformasi->getStatus()['name'] }}
                                            </span>
                                        </td>
                                        <td>{{ $permohonanInformasi->user->name }}</td>
                                        <td>
                                            <form
                                                action="{{ route('permohonanInformasi.destroy', $permohonanInformasi->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('permohonanInformasi.exportPdf', $permohonanInformasi->id) }}"
                                                    class="btn btn-sm btn-info" target="_blank">Cetak PDF</a>
                                                <a href="{{ route('permohonanInformasi.show', $permohonanInformasi->id) }}"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                                <input type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')" value="Delete" id="">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $permohonanInformasis->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
