@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Media Library</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('mediaLibrary.index') }}">Media Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Media Library Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Media Library</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('mediaLibrary.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mediaLibraries as $mediaLibrary)
                                    <tr>
                                        <td>{{ $mediaLibrary->name }}</td>
                                        <td><img src="{{ asset('uploads/' . $mediaLibrary->image) }}" style="height: 100px"
                                                class="img-thumbnail" alt=""></td>
                                        <td>
                                            <form action="{{ route('mediaLibrary.destroy', $mediaLibrary->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
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
