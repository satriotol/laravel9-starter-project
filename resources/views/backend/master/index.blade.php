@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Master</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('master.index') }}">Master</a></li>
                <li class="breadcrumb-item active" aria-current="page">Master Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Master</h3>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Banner</th>
                                    <th>Background</th>
                                    <th>Logo</th>
                                    <th>Nomor Telepon</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($masters as $master)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('uploads/' . $master->banner) }}" style="height: 100px"
                                                class="img-thumbnail" alt="">
                                        </td>
                                        <td>
                                            <img src="{{ asset('uploads/' . $master->background) }}" style="height: 100px"
                                                class="img-thumbnail" alt="">
                                        </td>
                                        <td>
                                            <img src="{{ asset('uploads/' . $master->logo) }}" style="height: 100px"
                                                class="img-thumbnail" alt="">
                                        </td>
                                        <td>{{ $master->phone }}</td>
                                        <td>{{ $master->email }}</td>

                                        <td>
                                            {{-- <form action="{{ route('master.destroy', $master->id) }}" method="post">
                                                @csrf
                                                @method('delete') --}}
                                                <a href="{{ route('master.edit', $master->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                {{-- <input type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')" value="Delete" id="">
                                            </form> --}}
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
