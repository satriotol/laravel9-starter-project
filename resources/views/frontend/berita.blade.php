@extends('frontend_layouts.main')
@push('css')
    <style>
        .brand-area .brand .single-item {
            border: 0 !important;

        }
    </style>
@endpush
@section('content')
    <section class="breadcrumb-area" style="">
        <div class="container text-center">
            <h1>
                @if (Route::is('berita', 'beritaCategory'))
                    Berita
                @else
                    Kegiatan
                @endif
                @isset($beritaCategory)
                    / {{ $beritaCategory->name }}
                @endisset
            </h1>
        </div>
    </section>
    <section class="blog-grid-area">
        <div class="container">
            <div class="row">

                @isset($beritaCategory)
                    @isset($beritaCategory->description)
                        <div class="col-md-8">
                            <div class="sec-title" style="padding-bottom: 0">
                                <h1>{{ $beritaCategory->name }}</h1>
                                <span class="border"></span>
                                @isset($beritaCategory->description)
                                    <div>
                                        {!! $beritaCategory->description !!}
                                    </div>
                                @endisset
                            </div>
                        </div>
                    @endisset
                    @isset($beritaCategory->image)
                        <div class="col-md-4">
                            <img src="{{ asset('uploads/' . $beritaCategory->image) }}" class="img-thumbnail" alt="">
                        </div>
                    @endisset
                @endisset
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    @isset($beritaCategory)
                        @if ($beritaCategory->berita_category_galleries->count() > 0)
                            <section class="brand-area">
                                <div class="brand">
                                    @foreach ($beritaCategory->berita_category_galleries as $berita_category_gallery)
                                        <div class="single-item">
                                            <a href="{{ asset('uploads/' . $berita_category_gallery->image) }}"
                                                data-rel="prettyPhoto{{ $berita_category_gallery->id }}">
                                                <img src="{{ asset('uploads/' . $berita_category_gallery->image) }}"
                                                    style="height:100%!important; object-fit:contain" class="img-thumbnail">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        @endif
                    @endisset
                    <div class="row">
                        @foreach ($beritas as $berita)
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="single-blog-post">
                                    <a href="{{ route('detailBerita', $berita->id) }}">
                                        <div class="img-holder">
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
                                            <a href="{{ route('detailBerita', $berita->id) }}"
                                                class="btn btn-danger w-100">Baca
                                                Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="post-pagination text-center">
                                    {{ $beritas->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-7 col-xs-12">
                    <div class="sidebar-wrapper">
                        <div class="single-sidebar">
                            <form class="search-form" action="">
                                <input placeholder="Cari..." type="text" name="title" value="{{ @old('title') }}">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        @isset($beritaCategory->logo)
                            <div class="single-sidebar">
                                <div class="sec-title">
                                    <h3>Logo</h3>
                                    <span class="border"></span>
                                </div>
                                <img src="{{ asset('uploads/' . $beritaCategory->logo) }}" style="width: 100%" alt="">
                            </div>
                        @endisset
                        <div class="single-sidebar">
                            <div class="sec-title">
                                <h3>Kategori</h3>
                                <span class="border"></span>
                            </div>
                            <ul class="categories clearfix">
                                @foreach ($beritaCategories as $beritaCategory)
                                    <li>
                                        @if (Route::is('berita', 'beritaCategory'))
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
                                                        @if (Route::is('berita', 'beritaCategory'))
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
                                            @if (Route::is('berita', 'beritaCategory'))
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
@endsection
