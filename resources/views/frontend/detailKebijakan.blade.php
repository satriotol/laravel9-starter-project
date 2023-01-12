@extends('frontend_layouts.main')
@section('content')
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area">
        <div class="container text-center">
            <h1>
                {{ $kebijakan->name }}
            </h1>
        </div>
    </section>
    <!--End breadcrumb area-->
    <section class="checkout-area" style="padding-top: 0">
        <div class="container">
            <div class="row bottom">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table">
                        <div class="sec-title">
                            <h2>{{ $kebijakan->name }}</h2>
                            <span class="border"></span>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Jenis</th>
                                    <td>{{ $kebijakan->kebijakan_category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Entitas</th>
                                    <td>{{ $kebijakan->entitas }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor</th>
                                    <td>{{ $kebijakan->nomor }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun</th>
                                    <td>{{ $kebijakan->tahun }}</td>
                                </tr>
                                <tr>
                                    <th>Judul</th>
                                    <td>{{ $kebijakan->name }}</td>
                                </tr>
                                <tr>
                                    <th>Ditetapkan Tanggal</th>
                                    <td>{{ $kebijakan->ditetapkan_tanggal }}</td>
                                </tr>
                                <tr>
                                    <th>Diundangkan Tanggal</th>
                                    <td>{{ $kebijakan->diundangkan_tanggal }}</td>
                                </tr>
                                <tr>
                                    <th>Berlaku Tanggal</th>
                                    <td>{{ $kebijakan->berlaku_tanggal }}</td>
                                </tr>
                                <tr>
                                    <th>Sumber</th>
                                    <td>{{ $kebijakan->sumber }}</td>
                                </tr>
                                <tr>

                                    <th>Status</th>
                                    <td>      <div class="badge"  style="background-color:{{ $kebijakan->kebijakan_statuses->color }}">{{ $kebijakan->kebijakan_statuses->name }}</div>
                                    <td>
                                        {{-- {{ $kebijakan->sumber }}</td> --}}
                                </tr>
                                <tr>
                                    <th>Tema</th>
                                    <td>
                                        @foreach ($kebijakan->temas as $tema)
                                            <div class="badge">
                                                {{ $tema->name }}
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>File</th>
                                    <td><a href="{{ asset('uploads/' . $kebijakan->file) }}" target="_blank"
                                            class="btn btn-sm btn-danger">Buka File</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
