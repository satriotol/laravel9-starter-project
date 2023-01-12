@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Informasi Publik</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ppidInfopublic.index') }}">Informasi Publik</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel Informasi Publik</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Publik</h3>
                </div>
                <div class="card-body">
                    <div class="text-end mb-2">
                        <a href="{{ route('ppidInfopublic.create') }}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppidInfopublics as $ppidInfopublic)
                                    <tr>
                                        <td>{{ $ppidInfopublic->name }}</td>

                                        @if ($ppidInfopublic->category== 1)
                                            <td>Informasi Berkala</td>
                                        @elseif ($ppidInfopublic->category == 2)
                                            <td>Informasi Setiap Saat</td>
                                        @elseif ($ppidInfopublic->category == 3)
                                            <td>Informasi Dikecualikan</td>
                                        @else
                                            <td>Informasi Serta Merta</td>
                                        @endif

                                        <td>
                                            <form
                                                action="{{ route('ppidInfopublic.destroy', $ppidInfopublic->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('ppidInfopublic.edit', $ppidInfopublic->id) }}"
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
