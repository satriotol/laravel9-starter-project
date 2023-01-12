@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Kebijakan Status</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('kebijakanStatus.index') }}">Kebijakan Status</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kebijakan Status Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kebijakan Status</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('kebijakanStatus.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kode Warna</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kebijakanStatuses as $kebijakanStatus)
                                    <tr>
                                        <td>{{ $kebijakanStatus->name }}</td>
                                        <td><div style=" height: 20px;
                                            width: 20px;
                                            border: 1px solid black;
                                            margin-right : 5px;
                                            background-color:{{ $kebijakanStatus->color }}"></div></td>
                                        <td>
                                            <form action="{{ route('kebijakanStatus.destroy', $kebijakanStatus->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('kebijakanStatus.edit', $kebijakanStatus->id) }}"
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
