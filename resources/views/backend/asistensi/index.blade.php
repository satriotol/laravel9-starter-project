@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Asistensi</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('asistensi.index') }}">WBS</a></li>
                <li class="breadcrumb-item active" aria-current="page">Asistensi</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Asistensi</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('asistensi.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Laporan Masuk</th>
                                    <th>Status</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asistensis as $asistensi)
                                    <tr>
                                        <td>{{ $asistensi->created_at }}</td>
                                        <td>
                                            <span class="badge bg-{{ $asistensi->getStatus()['color'] }}">
                                                {{ $asistensi->getStatus()['name'] }}
                                            </span>
                                        </td>
                                        <td>{{ $asistensi->user->name }}</td>
                                        <td><a href="{{ route('konsultasiAsistensiCategory.index') }}"
                                                target="_blank">{{ $asistensi->konsultasi_asistensi_category->name }}</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('asistensi.destroy', $asistensi->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('asistensi.show', $asistensi->id) }}"
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
                            {{ $asistensis->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
