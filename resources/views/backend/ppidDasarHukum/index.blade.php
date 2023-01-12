@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Dasar Hukum PPID</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ppidDasarHukum.index') }}">Dasar Hukum PPID</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel Dasar Hukum PPID</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dasar Hukum PPID</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('ppidDasarHukum.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Deskripsi</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppidDasarHukums as $ppidDasarHukum)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('uploads/' . $ppidDasarHukum->image) }}" style="height: 100px"
                                                class="img-thumbnail" alt="">
                                        </td>
                                        <td>{{ $ppidDasarHukum->description }}</td>
                                        <td>
                                            @foreach($ppidDasarHukum->PPIDDasarHukumFile as $filepdf)
                                            <a href="#"
                                                onclick="window.open('{{ asset('uploads/' . $filepdf->file) }}','_blank')"
                                                class="btn btn-sm btn-info">{{ $filepdf->name }}</a>
                                            @endforeach
                                        </td>
                                        <td>
                                            <form action="{{ route('ppidDasarHukum.destroy', $ppidDasarHukum->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('ppidDasarHukum.edit', $ppidDasarHukum->id) }}"
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
