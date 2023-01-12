@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Laporan Upg</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('upgReport.index') }}">Upg</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Upg</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Laporan Upg</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('upgReport.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Laporan Masuk</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($upgReports as $upgReport)
                                    <tr>
                                        <td>{{ $upgReport->created_at }}</td>
                                        <td>{{ $upgReport->user->name }}</td>
                                        <td>
                                            <span class="badge bg-{{ $upgReport->getStatus()['color'] }}">
                                                {{ $upgReport->getStatus()['name'] }}
                                            </span>
                                        </td>
                                        <td><a href="{{ route('upgReport.index') }}"
                                                target="_blank">{{ $upgReport->upg_category->name }}</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('upgReport.destroy', $upgReport->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('upgReport.exportPdf', $upgReport->id) }}"
                                                    class="btn btn-sm btn-info" target="_blank">Cetak PDF</a>
                                                <a href="{{ route('upgReport.show', $upgReport->id) }}"
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
                            {{ $upgReports->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
