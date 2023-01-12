@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Tata Cara Pengaduan Konsisten</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('konsistenStep.index') }}">Konsisten</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tata Cara Pengaduan Konsisten</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tata Cara Pengaduan Konsisten</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('konsistenStep.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Nomor Urut</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konsistenSteps as $konsistenStep)
                                    <tr>
                                        <td>{{ $konsistenStep->number }}</td>
                                        <td>{!! $konsistenStep->description !!}</td>
                                        <td>
                                            <form action="{{ route('konsistenStep.destroy', $konsistenStep->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('konsistenStep.edit', $konsistenStep->id) }}"
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
