@extends('frontend_layouts.main')
@push('head')
    <meta name="keywords" content="{{ $berita->title }}">
    <meta name="description" content="{{ $berita->description }}">
    <meta property="og:title" content="{{ $berita->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('detailBerita', $berita->id) }}">
    <meta property="og:description" content="{{ $berita->description }}">
    <meta property="og:image" content="{{ asset('uploads/' . $berita->image) }}">
    <meta name="author" content="INSPEKTORAT KOTA SEMRANG">
@endpush
@push('css')
    <style>
        .brand-area {
            padding-bottom: 5rem !important;
            padding-top: 1rem !important;
        }

        .brand-area .brand .single-item {
            border: 0 !important;

        }

        a {
            color: #f60035;
        }

        a:hover {
            color: #990021;

        }

        .owl-stage-outer {
            padding: 0 !important;
        }
    </style>
@endpush
@section('content')
    <!--Start blog area-->
    <section id="blog-area" class="blog-single-area" style="padding-bottom: 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="blog-post">
                        <div class="single-blog-post">
                            <div class="img-holder">
                                <img src="{{ asset('uploads/' . $berita->image) }}" alt="Awesome Image">
                            </div>
                            <div class="text-holder">
                                <h4>{{ $berita->title }}</h4>
                                <div class="text">
                                    {!! $berita->description !!}
                                    @if ($berita->berita_files->count() > 0)
                                        <h4>Materi</h4>
                                        <section class="brand-area">
                                            <ul>
                                                @foreach ($berita->berita_files as $berita_file)
                                                    <li><a href="{{ asset('uploads/' . $berita_file->file) }}"
                                                            target="_blank">{{ $berita_file->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </section>
                                    @endif
                                    @if ($berita->berita_galleries->count() > 0)
                                        <section class="brand-area" style="padding-top: 50px; padding-bottom:0;">
                                            <div class="brand">
                                                @foreach ($berita->berita_galleries as $berita_gallery)
                                                    <div class="single-item">
                                                        <a href="{{ asset('uploads/' . $berita_gallery->image) }}"
                                                            data-rel="prettyPhoto{{ $berita_gallery->id }}">
                                                            <img src="{{ asset('uploads/' . $berita_gallery->image) }}"
                                                                style="height:100%!important; object-fit:contain"
                                                                class="img-thumbnail">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </section>
                                    @endif
                                </div>
                                <div class="meta-info clearfix">
                                    <div class="left pull-left">
                                        <ul class="post-info">
                                            <li>Di Upload <a href="#">{{ $berita->user?->name }}</a></li>
                                            <li><a
                                                    href="{{ route('beritaCategory', $berita->berita_category_id) }}">{{ $berita->berita_category->name }}</a>
                                            </li>
                                            <li>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('detailBerita', $berita->id) }}"
                                                    target="_blank">
                                                    <i class="fa-brands fa-facebook-f" style="color: #3b5998"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="http://twitter.com/share?text={{ $berita->title }}&url={{ route('detailBerita', $berita->id) }}"
                                                    target="_blank">
                                                    <i class="fa-brands fa-twitter" style="color: #00acee"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="whatsapp://send?text={{ route('detailBerita', $berita->id) }}"
                                                    target="_blank">
                                                    <i class="fa-brands fa-whatsapp" style="color: #075e54"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Start sidebar Wrapper-->
                <div class="col-lg-3 col-md-4 col-sm-7 col-xs-12">
                    <div class="sidebar-wrapper">
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3>Kategori</h3>
                                <span class="border"></span>
                            </div>
                            <ul class="categories clearfix">
                                @foreach ($beritaCategories as $beritaCategory)
                                    <li>
                                        @if (Route::is('berita', 'beritaCategory', 'detailBerita', 'detailBerita'))
                                            <a href="{{ route('beritaCategory', $beritaCategory->id) }}">
                                                {{ $beritaCategory->name }}
                                            </a>
                                        @else
                                            <a href="{{ route('kegiatanCategory', $beritaCategory->id) }}">
                                                {{ $beritaCategory->name }}
                                            </a>
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3>Berita Terbaru</h3>
                                <span class="border"></span>
                            </div>
                            <ul class="recent-post">
                                @foreach ($recentBeritas as $recentBerita)
                                    <li>
                                        <div style="height: 100%;" class="img-holder">
                                            <img src="{{ asset('uploads/' . $recentBerita->image) }}"
                                                style="height: 100%;object-fit: cover;" alt="{{ $recentBerita->title }}">
                                            <div class="overlay-style-two">
                                                <div class="box">
                                                    <div class="content">
                                                        @if (Route::is('berita', 'beritaCategory', 'detailBerita'))
                                                            <a href="{{ route('detailBerita', $recentBerita->id) }}">
                                                                <i class="fa fa-link" aria-hidden="true"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('detailKegiatan', $recentBerita->id) }}">
                                                                <i class="fa fa-link" aria-hidden="true"></i>
                                                            </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="title-holder">
                                            @if (Route::is('berita', 'beritaCategory', 'detailBerita'))
                                                <a href="{{ route('detailBerita', $recentBerita->id) }}">
                                                    <h5 class="post-title">
                                                        {{ Str::limit($recentBerita->title, 30, '...') }}
                                                    </h5>
                                                </a>
                                            @else
                                                <a href="{{ route('detailKegiatan', $recentBerita->id) }}">
                                                    <h5 class="post-title">
                                                        {{ Str::limit($recentBerita->title, 30, '...') }}
                                                    </h5>
                                                </a>
                                            @endif

                                            <h6 class="post-date">
                                                <i class="icon-calendar-with-spring-binder-and-date-blocks"></i>
                                                {{ date($recentBerita->created_at) }}
                                            </h6>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End blog area-->
@endsection
