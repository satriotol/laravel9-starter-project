@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Beranda</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda.index') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Beranda Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Beranda</h3>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Sambutan</th>
                                    <th>Video</th>
                                    <th>Thumbnail Video</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($berandas as $beranda)
                                    <tr>
                                        <td>{{ $beranda->sambutan }}</td>
                                        <td>{{ $beranda->video_url }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/' . $beranda->thumbnail_video) }}" style="height: 100px"
                                                class="img-thumbnail" alt="">
                                        </td>
                                        <td>
                                            {{-- <form action="{{ route('beranda.destroy', $beranda->id) }}" method="post">
                                                @csrf
                                                @method('delete') --}}
                                                <a href="{{ route('beranda.edit', $beranda->id) }}"
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
