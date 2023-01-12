@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Sub Kategori Berita</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beritaSubcategory.index') }}">Sub Kategori Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel Sub Kategori Berita</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sub Kategori Berita</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('beritaSubcategory.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Kategori Berita</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beritaSubcategories as $beritaSubcategory)
                                    <tr>
                                        <td>{{ $beritaSubcategory->berita_category->name }}</td>
                                        <td>{{ $beritaSubcategory->name }}</td>
                                        <td><img src="{{ asset('uploads/' . $beritaSubcategory->image) }}" style="height: 100px" class="img-thumbnail" alt=""></td>
                                        <td>
                                            <form action="{{ route('beritaSubcategory.destroy', $beritaSubcategory->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('beritaSubcategory.edit', $beritaSubcategory->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <input type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" value="Delete"
                                                    id="">
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
