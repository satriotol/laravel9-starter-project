@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Layanan Informasi</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ppidLayananInformasi.index') }}">Layanan Informasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel Layanan Informasi</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Layanan Informasi</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('ppidLayananInformasi.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppidLayananInformasis as $ppidLayananInformasi)
                                    <tr>
                                        <td>{{ $ppidLayananInformasi->name }}</td>
                                        <td>{{ $ppidLayananInformasi->type }}</td>
                                        <td>
                                            <form
                                                action="{{ route('ppidLayananInformasi.destroy', $ppidLayananInformasi->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('ppidLayananInformasi.edit', $ppidLayananInformasi->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <input type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')" value="Delete" id="">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
