@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Role</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Role</a></li>
                <li class="breadcrumb-item active" aria-current="page">Role Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Role</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('role.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <form action="{{ route('role.destroy', $role->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-sm btn-primary"
                                                href="{{ route('role.edit', $role->id) }}">
                                                <span class="fe fe-edit"> </span>
                                            </a>
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
