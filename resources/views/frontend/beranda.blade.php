@extends('frontend_layouts.main')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <style>
        .carousel-cell {
            width: 100%;
            /* full width */
            /* max-height: 800px; */
            /* height of carousel */
            margin-right: 10px;
        }

        @media (max-width: 991.98px) {
            .berita-slider {
                display: none;
            }
        }

        @media (min-width: 992px) {
            .berita-list {
                height: 383px;
            }
        }

        @media (min-width: 1280px) {
            .berita-list {
                height: 491px;
            }
        }

        @media (min-width: 1440px) {
            .berita-list {
                height: 551px;
            }
        }

        @media (min-width: 1920px) {
            .berita-list {
                height: 731px;
            }
        }
    </style>
@endpush
@section('content')
    <section style="background: url('{{ asset('uploads/' . $master->banner) }}');">
        <div class="container">
            <div class="main-carousel">
                @foreach ($sliders as $slider)
                    <div class="carousel-cell"><img src="{{ asset('uploads/' . $slider->image) }}" alt="" class="w-100"
                            style="height: 100%">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="call-to-action-area">
        <div class="container">
            <div class="title text-center">
                <h3>Layanan Inspektorat Kota Semarang</h3>
                <p>Detail Layanan</p>
            </div>
            <div class="row">
                @foreach ($layananLinks as $layananLink)
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center mx-auto">
                        <div class="single-item hvr-shadow text-center" data-aos="fade-up">
                            <div class="img-holder">
                                <a href="{{ $layananLink->url }}" target="_blank">
                                    <img src="{{ asset('uploads/' . $layananLink->image) }}"
                                        style="height:100px;object-fit:contain" alt="{{ $layananLink->name }}">
                                </a>
                            </div>
                            <div class="text-holder">
                                <h3>{{ $layananLink->name }}</h3>
                                <p>{!! $layananLink->short_description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="video-gallery-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-holder">
                        <h3>Sambutan Inspektorat</h3>
                        <div class="text" data-aos="fade-left">
                            <p>{!! $beranda->sambutan !!}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="smart-approach-area">
        <div class="container">
            <div class="sec-title text-center">
                <h1>Berita & Kegiatan <span class="text-red">Terkini</span></h1>
                <span class="border"></span>
            </div>

            <div class="row row-flex">
                @foreach ($beritas as $berita)
                    <div class="col-md-4">
                        <div class="single-blog-post">
                            <a href="{{ route('detailBerita', $berita->id) }}">
                                <div class="img-holder" data-aos="flip-up">
                                    <img src="{{ asset('uploads/' . $berita->image) }}"
                                        style="width:370px;height:220px; object-fit:cover" alt="Awesome Image">
                                </div>
                            </a>
                            <div class="text-holder">
                                <a href="{{ route('detailBerita', $berita->id) }}">
                                    <h3 class="blog-title">{{ Str::limit($berita->title, 100, '...') }}</h3>
                                </a>
                                <small class="text-red-thin">{{ $berita->berita_category->name }} | <i
                                        class="fa fa-calendar mr-5 text-theme-colored"></i>
                                    {{ date('d/m/Y', strtotime($berita->created_at)) }}
                                </small>
                                @isset($berita->short_description)
                                    <div class="text">
                                        {{ $berita->short_description }} ...
                                    </div>
                                @endisset
                                <div class="meta-info clearfix" style="margin-top: 2rem">
                                    <a href="{{ route('detailBerita', $berita->id) }}" class="btn btn-danger w-100">Baca
                                        Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@push('custom-scripts')
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script>
        $('.main-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            autoPlay: 2000,
            pageDots: false,
            wrapAround: true
        });
    </script>
@endpush
