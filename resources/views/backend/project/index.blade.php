@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Project</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Project</a></li>
                <li class="breadcrumb-item active" aria-current="page">Project Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Project</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('project.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table border table-bordered text-nowrap text-md-nowrap table-sm mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>Tipe Projek</th>
                                    <th>opd_id</th>
                                    <th>Nama Project</th>
                                    <th>Url</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tim</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->type->name }}</td>
                                        <td>{{ $project->opd_id }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->url }}</td>
                                        <td>{{ $project->start_at }}</td>
                                        <td>
                                            @foreach ($project->users as $user)
                                                <ul>
                                                    <div class="badge bg-primary">{{ $user->name }}</div>
                                                </ul>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('project.destroy', $project->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('project.edit', $project->id) }}">
                                                    Edit
                                                </a>
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
