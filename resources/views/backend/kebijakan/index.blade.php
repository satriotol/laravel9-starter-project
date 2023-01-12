@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Kebijakan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('kebijakan.index') }}">Kebijakan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kebijakan Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kebijakan</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('kebijakan.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kategori Kebijakan & Tema</th>
                                    <th>Status</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kebijakans as $kebijakan)
                                    <tr>
                                        <td>{{ $kebijakan->name }}</td>
                                        <td>{{ $kebijakan->kebijakan_category->name }} | @foreach ($kebijakan->temas as $tema)
                                                <div class="badge bg-primary">{{ $tema->name }}</div>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{-- <div class="badge bg-primary">{{ $kebijakan->kebijakan_status_id }}</div> --}}
                                            <div class="badge"  style="background-color:{{ $kebijakan->kebijakan_statuses->color }}">{{ $kebijakan->kebijakan_statuses->name }}</div>
                                        </td>
                                        <td>
                                            <a href="#"
                                                onclick="window.open('{{ asset('uploads/' . $kebijakan->file) }}','_blank')"
                                                class="btn btn-sm btn-info">View</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('kebijakan.destroy', $kebijakan->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('kebijakan.edit', $kebijakan->id) }}"
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
