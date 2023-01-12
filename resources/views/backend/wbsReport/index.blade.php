@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Laporan WBS</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('wbsReport.index') }}">WBS</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan WBS</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Laporan WBS</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('wbsReport.create') }}" class="btn btn-sm btn-primary">Tambah</a>
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
                                @foreach ($wbsReports as $wbsReport)
                                    <tr>
                                        <td>{{ $wbsReport->created_at }}</td>
                                        <td>{{ $wbsReport->user->name }}</td>
                                        <td>
                                            <span class="badge bg-{{ $wbsReport->getStatus()['color'] }}">
                                                {{ $wbsReport->getStatus()['name'] }}
                                            </span>
                                        </td>
                                        <td>{{ $wbsReport->wbs_category->name }}
                                        </td>
                                        <td>
                                            <form action="{{ route('wbsReport.destroy', $wbsReport->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('wbsReport.exportPdf', $wbsReport->id) }}"
                                                    class="btn btn-sm btn-info" target="_blank">Cetak PDF</a>
                                                <a href="{{ route('wbsReport.show', $wbsReport->id) }}"
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
                            {{ $wbsReports->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
