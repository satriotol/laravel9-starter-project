@extends('backend_layouts.main')
@section('content')
    <div class="page-header">
        <h1 class="page-title">Audit</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('audit.index') }}">Audit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Audit Tabel</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Audit</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Event</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($audits as $audit)
                                <tr>
                                    <td>{{ $audit->created_at }}</td>
                                    <td>{{ $audit->user->name }} <br>{{ $audit->auditable_type }}
                                        <br>
                                        <div class="badge bg-danger">
                                            {{ $audit->ip_address }}
                                        </div>
                                        <br>
                                        <a href="{{ $audit->url }}" target="_blank">{{ $audit->url }}</a>
                                        <br>
                                        <div class="badge bg-success">
                                            {{ $audit->event }}
                                        </div>
                                    </td>
                                    <td>
                                        {{-- <pre>{{ $audit->old_values }}</pre> --}}
                                        <textarea name="" id="" rows="5" readonly class="form-control">{{ $audit->old_values }}</textarea>
                                        <textarea name="" id="" rows="5" readonly class="form-control mt-2">{{ $audit->new_values }}</textarea>
                                        {{-- <pre>{{ $audit->new_values }}</pre> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $audits->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
