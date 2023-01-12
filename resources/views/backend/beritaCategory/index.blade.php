@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Kategori Berita</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beritaCategory.index') }}">Kategori Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel Kategori Berita</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kategori Berita</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('beritaCategory.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Kegiatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beritaCategories as $beritaCategory)
                                    <tr>
                                        <td>{{ $beritaCategory->name }}</td>
                                        <td><img src="{{ asset('uploads/' . $beritaCategory->image) }}" style="height: 100px" class="img-thumbnail" alt=""></td>

                                        @if ($beritaCategory->is_kegiatan === 1)
                                        <td>Kegiatan</td>
                                        @else
                                        <td>Bukan Kegiatan</td>
                                        @endif


                                        <td>
                                            <form action="{{ route('beritaCategory.destroy', $beritaCategory->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('beritaCategory.edit', $beritaCategory->id) }}"
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
