@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Dasar Hukum PPID File</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ppidDasarHukumFile.index') }}">Dasar Hukum PPID File</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dasar Hukum PPID File Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dasar Hukum PPID File</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('ppidDasarHukumFile.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Dasar Hukum PPID</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppidDasarHukumFiles as $ppidDasarHukumFile)
                                    <tr>
                                        <td>{{ $ppidDasarHukumFile->name }}</td>
                                        {{-- <td>{{ $ppidDasarHukumFile->PPIDDasarHukums->description }}</td> --}}
                                        <td>
                                            <a href="#"
                                                onclick="window.open('{{ asset('uploads/' . $ppidDasarHukumFile->file) }}','_blank')"
                                                class="btn btn-sm btn-info">View</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('ppidDasarHukumFile.destroy', $ppidDasarHukumFile->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('ppidDasarHukumFile.edit', $ppidDasarHukumFile->id) }}"
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
