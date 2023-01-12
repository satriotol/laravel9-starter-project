@extends('frontend_layouts.main')
@push('css')
    <style>
        ul li.listing {
            padding: 2px !important;
            margin-left: 35px !important;
        }

        .textcolor {
            color: black !important;
            ;
        }

        .listicon {
            list-style-type: circle
        }

        /* timeline */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #3ea0e2;
        }

        ::selection {
            color: #fff;
            background: #3ea0e2;
        }

        .wrapper {
            max-width: 1080px;
            margin: 50px auto;
            padding: 0 20px;
            position: relative;
        }

        .wrapper .center-line {
            position: absolute;
            height: 100%;
            width: 4px;
            background: #fff;
            left: 50%;
            top: 20px;
            transform: translateX(-50%);
        }

        .wrapper .row {
            display: flex;
        }

        .wrapper .row-1 {
            justify-content: flex-start;
        }

        .wrapper .row-2 {
            justify-content: flex-end;
        }

        .wrapper .row section {
            background: #fff;
            border-radius: 5px;
            width: calc(50% - 40px);
            padding: 20px;
            position: relative;
        }

        .wrapper .row section::before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            background: #fff;
            top: 28px;
            z-index: -1;
            transform: rotate(45deg);
        }

        .row-1 section::before {
            right: -7px;
        }

        .row-2 section::before {
            left: -7px;
        }

        .row section .icon,
        .center-line .scroll-icon {
            position: absolute;
            background: #f2f2f2;
            height: 40px;
            width: 40px;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #3ea0e2;
            font-size: 17px;
            box-shadow: 0 0 0 4px #fff, inset 0 2px 0 rgba(0, 0, 0, 0.08), 0 3px 0 4px rgba(0, 0, 0, 0.05);
        }

        .center-line .scroll-icon {
            bottom: 0px;
            left: 50%;
            font-size: 25px;
            transform: translateX(-50%);
        }

        .row-1 section .icon {
            top: 15px;
            right: -60px;
        }

        .row-2 section .icon {
            top: 15px;
            left: -60px;
        }

        .row section .details,
        .row section .bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .row section .details .title {
            font-size: 22px;
            font-weight: 600;
        }

        .row section p {
            margin: 10px 0 17px 0;
        }

        .row section .bottom a {
            text-decoration: none;
            background: #3ea0e2;
            color: #fff;
            padding: 7px 15px;
            border-radius: 5px;
            /* font-size: 17px; */
            font-weight: 400;
            transition: all 0.3s ease;
        }

        .row section .bottom a:hover {
            transform: scale(0.97);
        }

        @media(max-width: 790px) {
            .wrapper .center-line {
                left: 40px;
            }

            .wrapper .row {
                margin: 30px 0 3px 60px;
            }

            .wrapper .row section {
                width: 100%;
            }

            .row-1 section::before {
                left: -7px;
            }

            .row-1 section .icon {
                left: -60px;
            }
        }

        @media(max-width: 440px) {

            .wrapper .center-line,
            .row section::before,
            .row section .icon {
                display: none;
            }

            .wrapper .row {
                margin: 10px 0;
            }
        }
    </style>
@endpush
@section('content')
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area">
        <div class="container text-center">
            <h1>
                PPID
                / Layanan Informasi
            </h1>
        </div>
    </section>
    <!--End breadcrumb area-->


    <!--Start Project grid with text area-->
    <section id="project-area" class="latest-project-area grid-with-text">
        <div class="container">
            <div class="row project-content  filter-layout">
                <!--Start single project-->
                <div class="col-md-4 col-sm-12 col-xs-12 filter-item industrial financial transportation">
                    <div class="single-project text-center" data-toggle="modal" data-target="#myModal1">
                        <div class="outer-img-box">
                            <div class="img-holder">
                                <img href="project-single.html" src="{{ asset('frontend_assets/images/icon/route.png') }}"
                                    style="height: auto; max-width: 50%;" alt="Alur Layanan Informasi">
                            </div>
                        </div>
                        <div class="title-holder">
                            <h5>Alur Layanan Informasi</h5>
                        </div>
                    </div>
                </div>
                <!--End single project-->

                <!--Start single project-->
                <div class="col-md-4 col-sm-12 col-xs-12 filter-item industrial financial transportation">
                    <div class="single-project text-center"data-toggle="modal" data-target="#laporanModal">
                        <div class="outer-img-box">
                            <div class="img-holder">
                                <img href="project-single.html" src="{{ asset('frontend_assets/images/icon/report.png') }}"
                                    style="height: auto; max-width: 50%;" alt="Awesome Image">
                            </div>
                        </div>
                        <div class="title-holder">
                            <h5>Laporan Layanan Informasi dan Dokumentasi</h5>
                        </div>

                    </div>
                </div>
                <!--End single project-->
                <!--Start single project-->
                <div class="col-md-4 col-sm-12 col-xs-12 filter-item industrial financial transportation">
                    <div class="single-project text-center">
                        <a href="{{ route('permohonanInformasi.index') }}" target="_blank">
                            <div class="outer-img-box">
                                <div class="img-holder">
                                    <img href="project-single.html"
                                        src="{{ asset('frontend_assets/images/icon/reporthand.png') }}"
                                        style="height: auto; max-width: 50%;" alt="Awesome Image">
                                </div>
                            </div>
                            <div class="title-holder">
                                <h5>Permohonan Layanan Informasi</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <!--End single project-->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal1" tabindex="-1" style="z-index: 999999999999999" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Alur Layanan Informasi</h4>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('uploads/' . $aturlayananinformasi->image) }}" style="height: 100px"
                            class="img-thumbnail" alt="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="laporanModal" tabindex="-1" style="z-index: 999999999999999" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Laporan Layanan Informasi dan Dokumentasi</h4>
                    </div>
                    <div class="modal-body">
                        <div class="wrapper">
                            @foreach ($ppidLayananInformasis as $ppidLayananInformasi)
                                @if ($ppidLayananInformasi->type == 'Detail')
                                    @if ($ppidLayananInformasi->id % 2 == 0)
                                        <div class="row row-1">
                                            <section>
                                                <i class="icon fas fa-star"></i>
                                                <div class="details">
                                                    <span class="title">{{ $ppidLayananInformasi->name }}</span>
                                                </div>
                                                @foreach ($ppidLayananInformasi->ppid_layanan_informasi_details as $ppid_layanan_informasi_detail)
                                                    <ul>
                                                        <li class="listing listicon">
                                                            <a class="textcolor"
                                                                href="{{ asset('uploads/' . $ppid_layanan_informasi_detail->file) }}"
                                                                target="_blank">
                                                                {{ $ppid_layanan_informasi_detail->name }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </section>
                                        </div>
                                    @else
                                        <div class="row row-2">
                                            <section>
                                                <i class="icon fas fa-star"></i>
                                                <div class="details">
                                                    <span class="title">{{ $ppidLayananInformasi->name }}</span>
                                                </div>
                                                @foreach ($ppidLayananInformasi->ppid_layanan_informasi_details as $ppid_layanan_informasi_detail)
                                                    <ul>
                                                        <li class="listing listicon">
                                                            <a class="textcolor"
                                                                href="{{ asset('uploads/' . $ppid_layanan_informasi_detail->file) }}"
                                                                target="_blank">
                                                                {{ $ppid_layanan_informasi_detail->name }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </section>
                                        </div>
                                    @endif
                                @endif
                            @endforeach

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--End Project grid with text area-->
@endsection
@push('custom-scripts')
@endpush
