@extends('frontend_layouts.main')
@section('content')
    <section class="breadcrumb-area" style="">
        <div class="container text-center">
            <h1>
                Dasar Hukum PPID
            </h1>
        </div>
    </section>
    <!--Start Project grid with text area-->
    <section id="project-area" class="project-single-area">
        <div class="container">
            @isset($ppidProfileDasarHukum->image)
                <div class="row">
                    <div class="col-md-12">
                        <div class="single-project-img-box">
                            <img src="{{ asset('uploads/' . $ppidProfileDasarHukum->image) }}">
                        </div>
                    </div>
                </div>
            @endisset
            <div class="row">
                <div class="col-md-4">
                    <div class="card-header">
                        <h3 class="card-title">File</h3>
                    </div>

                    @isset($ppidProfileDasarHukum)
                        <table id="example2" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <th>Nama</th>
                                <th>File</th>
                            </thead>
                            <tbody>
                                @foreach ($ppidProfileDasarHukum->PPIDDasarHukumFile as $ppidDasarHukum)
                                    <tr>
                                        <td>{{ $ppidDasarHukum->name }}</td>
                                        <td> <a href="#"
                                                onclick="window.open('{{ asset('uploads/' . $ppidDasarHukum->file) }}','_blank')"
                                                class="btn btn-sm btn-info">view</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endisset
                </div>
                <div class="col-md-8">
                    <div class="legal-work-content">
                        <p>{!! $ppidProfileDasarHukum->description !!}</p>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>

        </div>
    </section>
    <!--End Project grid with text area-->
@endsection
