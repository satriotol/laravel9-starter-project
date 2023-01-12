@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Kategori Dokumen</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('documentCategory.index') }}">Kategori Dokumen</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kategori Dokumen Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kategori Dokumen</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('documentCategory.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documentCategories as $documentCategory)
                                    <tr>
                                        <td>{{ $documentCategory->name }}</td>
                                        <td>
                                            <form action="{{ route('documentCategory.destroy', $documentCategory->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('documentCategory.edit', $documentCategory->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <input type="submit" class="btn btn-sm btn-danger" value="Delete"
                                                    onclick="return confirm('Are you sure?')" id="">
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
