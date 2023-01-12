@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Konsultasi & Asistensi</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('konsultasi.index') }}">Konsultasi & Asistensi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Konsultasi & Asistensi</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Konsultasi & Asistensi</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('konsultasi.create') }}" class="btn btn-sm btn-primary">Tambah</a>
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
                                @foreach ($konsultasis as $konsultasi)
                                    <tr>
                                        <td>{{ $konsultasi->created_at }}</td>
                                        <td>{{ $konsultasi->opd->nama_opd }}</td>
                                        <td>
                                            <span class="badge bg-{{ $konsultasi->getStatus()['color'] }}">
                                                {{ $konsultasi->getStatus()['name'] }}
                                            </span>
                                        </td>
                                        <td>{{ $konsultasi->user->name }}</td>
                                        <td>{{ $konsultasi->konsultasi_asistensi_category->name }}
                                        </td>
                                        <td>
                                            <form action="{{ route('konsultasi.destroy', $konsultasi->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('konsultasi.show', $konsultasi->id) }}"
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
                            {{ $konsultasis->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
