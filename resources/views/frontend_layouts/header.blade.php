<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo">
                    <a href="{{ route('beranda') }}">
                        <img src="{{ asset('uploads/' . $master->logo) }}" alt="Awesome Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-contact-info">
                    <ul>
                        {{-- <li>
                            <div class="iocn-holder">
                                <span class="icon-technology"></span>
                            </div>
                            <div class="text-holder">
                                <h6>Telepon</h6>
                                <p>{{ $master->phone }}</p>
                            </div>
                        </li> --}}
                        {{-- <li>
                            <div class="iocn-holder">
                                <span class="icon-letter top-envelop"></span>
                            </div>
                            <div class="text-holder">
                                <h6>Email</h6>
                                <p>{{ $master->email }}</p>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>

        </div>
    </div>
</header>

<section class="mainmenu-area stricky">
    <div class="container">
        <div class="mainmenu-bg">
            <div class="row">
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <!--Start mainmenu-->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="home {{ current_class(['beranda']) }}"><a href="{{ route('beranda') }}"><span
                                            class="fa fa-home"></span></a></li>
                                <li class="{{ current_class(['profil']) }}"><a href="{{ route('profil') }}"><i
                                            class="fa-solid fa-user"></i> Profil</a></li>
                                <li class="dropdown {{ current_class(['documentCategory']) }}">
                                    <a href="#"><i class="far fa-file"></i> Dokumen</a>
                                    <ul>
                                        @foreach ($documentCategories as $documentCategory)
                                            <li><a href="{{ route('documentCategory', $documentCategory->id) }}">
                                                    {{ $documentCategory->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li
                                    class="dropdown {{ current_class(['ppidProfile', 'ppidProfileDasarHukum', 'ppidLayananInformasi']) }}">
                                    <a href="#"><i class="fa-solid fa-circle-question"></i> PPID</a>
                                    <ul>
                                        <li><a href="{{ route('ppidProfile') }}">Profil PPID</a></li>
                                        <li><a href="{{ route('ppidProfileDasarHukum') }}">Dasar Hukum</a></li>
                                        <li><a href="{{ route('ppidLayananInformasi') }}">Layanan Informasi</a></li>
                                        <li><a href="{{ route('ppidInfoPublic') }}">Informasi Publik</a></li>
                                        {{-- <li><a href="">Informasi Publik</a>

                                        </li> --}}
                                    </ul>
                                </li>
                                <li class="dropdown {{ current_class(['berita', 'beritaCategory', 'detailBerita']) }}">
                                    <a href="{{ route('berita') }}"><i class="far fa-newspaper"></i> Berita</a>
                                    <ul>
                                        @foreach ($masterBeritaCategories as $masterBeritaCategory)
                                            <li><a
                                                    href="{{ route('beritaCategory', $masterBeritaCategory->id) }}">{{ $masterBeritaCategory->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li
                                    class="dropdown {{ current_class(['kegiatan', 'kegiatanCategory', 'detailKegiatan']) }}">
                                    <a href="{{ route('kegiatan') }}"><i class="fa-solid fa-person-running"></i>
                                        Kegiatan</a>
                                    <ul>
                                        @foreach ($kegiatans as $kegiatan)
                                            <li><a
                                                    href="{{ route('kegiatanCategory', $kegiatan->id) }}">{{ $kegiatan->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown {{ current_class(['kebijakan', 'detailKebijakan']) }}"><a
                                        href="#"><i class="fa-solid fa-scale-balanced"></i> Kebijakan</a>
                                    <ul>
                                        @foreach ($kebijakanCategories as $kebijakanCategory)
                                            <li><a
                                                    href="{{ route('kebijakan', $kebijakanCategory->id) }}">{{ $kebijakanCategory->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown {{ current_class(['pengaduan']) }}">
                                    <a href="#"><i class="fa-solid fa-flag"></i> Pengaduan</a>
                                    <ul>
                                        @foreach ($pengaduanLinks as $pengaduanLink)
                                            <li><a target="_blank"
                                                    href="{{ $pengaduanLink->pengaduan_link }}">{{ $pengaduanLink->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!--End mainmenu-->
                </div>
            </div>
        </div>
    </div>
</section>
