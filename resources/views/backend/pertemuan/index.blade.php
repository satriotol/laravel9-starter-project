@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Pertemuan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pertemuan.index') }}">WBS</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pertemuan</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pertemuan</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('pertemuan.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Laporan Masuk</th>
                                    <th>OPD</th>
                                    <th>Status</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pertemuans as $pertemuan)
                                    <tr>
                                        <td>{{ $pertemuan->created_at }}</td>
                                        <td>{{ $pertemuan->opd->nama_opd }}</td>
                                        <td>
                                            <span class="badge bg-{{ $pertemuan->getStatus()['color'] }}">
                                                {{ $pertemuan->getStatus()['name'] }}
                                            </span>
                                        </td>
                                        <td>{{ $pertemuan->user->name }}</td>
                                        <td>{{ $pertemuan->konsultasi_asistensi_category->name }}
                                        </td>
                                        <td>
                                            <form action="{{ route('pertemuan.destroy', $pertemuan->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('pertemuan.show', $pertemuan->id) }}"
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
                            {{ $pertemuans->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
