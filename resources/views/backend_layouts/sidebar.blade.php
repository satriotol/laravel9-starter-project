<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard') }}">
                {{-- <img src="{{ asset('backend_assets/images/logoinspektorat.png') }}" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{ asset('backend_assets/images/pemkotsmg.png') }}" class="header-brand-img toggle-logo"
                    alt="logo"> --}}
                <img src="{{ asset('backend_assets/images/LambangSemarang.png') }}" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ asset('backend_assets/images/logoinspektorat.png') }}" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('dashboard') }}"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                @canany(['berita-index', 'beritaCategory-index'])
                    <li class="sub-category">
                        <h3>Berita</h3>
                    </li>
                @endcanany
                @can('berita-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['berita.*']) }}" href="{{ route('berita.index') }}"><i
                                class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Berita</span></a>
                    </li>
                @endcan
                @can('beritaCategory-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['beritaCategory.*']) }}"
                            href="{{ route('beritaCategory.index') }}"><i class="side-menu__icon fe fe-flag"></i><span
                                class="side-menu__label">Kategori Berita</span></a>
                    </li>
                @endcan
                @canany(['kebijakan-index', 'kebijakanCategory-index'])
                    <li class="sub-category">
                        <h3>Kebijakan</h3>
                    </li>
                @endcanany
                @can('kebijakan-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['kebijakan.*']) }}"
                            href="{{ route('kebijakan.index') }}"><i class="side-menu__icon fe fe-briefcase"></i><span
                                class="side-menu__label">Kebijakan</span></a>
                    </li>
                @endcan
                @can('kebijakanCategory-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['kebijakanCategory.*']) }}"
                            href="{{ route('kebijakanCategory.index') }}"><i
                                class="side-menu__icon fe fe-clipboard"></i><span class="side-menu__label">Kategori
                                Kebijakan</span></a>
                    </li>
                @endcan
                @can('kebijakanStatus-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['kebijakanStatus.*']) }}"
                            href="{{ route('kebijakanStatus.index') }}"><i class="side-menu__icon fe fe-info"></i><span
                                class="side-menu__label">Status
                                Kebijakan</span></a>
                    </li>
                @endcan
                @can('tema-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['tema.*']) }}" href="{{ route('tema.index') }}"><i
                                class="side-menu__icon fe fe-tag"></i><span class="side-menu__label">Tema
                                Kategori</span></a>
                    </li>
                @endcan
                @canany(['ppidDasarHukum-index', 'ppidLayananInformasi-index', 'ppidProfile-index',
                    'permohonanInformasi-index'])
                    <li class="sub-category">
                        <h3>PPID</h3>
                    </li>
                @endcanany
                @can('permohonanInformasi-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['permohonanInformasi.*']) }}"
                            href="{{ route('permohonanInformasi.index') }}">
                            <i class="side-menu__icon fe fe-file-plus"></i>
                            <span class="side-menu__label">Permohonan Informasi</span>
                            <span class="badge bg-pink side-badge">{{ $totalPendingPermohonanInformasi }}</span>
                        </a>
                    </li>
                @endcan
                @can('ppidProfile-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['ppidProfile.*']) }}"
                            href="{{ route('ppidProfile.index') }}"><i class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">Profil</span></a>
                    </li>
                @endcan
                @can('ppidDasarHukum-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['ppidDasarHukum.*']) }}"
                            href="{{ route('ppidDasarHukum.index') }}"><i class="side-menu__icon fe fe-book"></i><span
                                class="side-menu__label">Dasar Hukum PPID</span></a>
                    </li>
                @endcan

                @can('ppidLayananInformasi-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['ppidLayananInformasi.*']) }}"
                            href="{{ route('ppidLayananInformasi.index') }}"><i
                                class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Layanan
                                Informasi</span></a>
                    </li>
                @endcan
                @can('ppidInfopublic-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['ppidInfopublic.*']) }}"
                            href="{{ route('ppidInfopublic.index') }}"><i class="side-menu__icon fe fe-file-text"></i><span
                                class="side-menu__label">Informasi Publik</span></a>
                    </li>
                @endcan
                @can('ppidInfopublicSubcategory-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['ppidInfopublicSubcategory.*']) }}"
                            href="{{ route('ppidInfopublicSubcategory.index') }}"><i
                                class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Informasi Publik
                                Subkategori</span></a>
                    </li>
                @endcan
                @canany(['wbsAbout-index', 'wbsStep-index', 'wbsReport-index', 'wbsCategory-index'])
                    <li class="sub-category">
                        <h3>Whistleblower </h3>
                    </li>
                @endcan
                @can('wbsBeranda-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['wbsAbout.*']) }}"
                            href="{{ route('wbsBeranda.index') }}"><i class="side-menu__icon fe fe-bookmark"></i><span
                                class="side-menu__label">Whistleblower</span></a>
                    </li>
                @endcan
                @can('wbsAbout-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['wbsAbout.*']) }}"
                            href="{{ route('wbsAbout.index') }}"><i class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">Tentang Whistleblower</span></a>
                    </li>
                @endcan
                @can('wbsStep-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['wbsStep.*']) }}"
                            href="{{ route('wbsStep.index') }}"><i class="side-menu__icon fe fe-check-square"></i><span
                                class="side-menu__label">Tata Cara Pengaduan</span></a>
                    </li>
                @endcan
                @can('wbsCategory-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['wbsCategory.*']) }}"
                            href="{{ route('wbsCategory.index') }}"><i class="side-menu__icon fe fe-folder-plus"></i><span
                                class="side-menu__label">Kategori WBS</span></a>
                    </li>
                @endcan
                @can('wbsReport-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['wbsReport.*']) }}"
                            href="{{ route('wbsReport.index') }}"><i class="side-menu__icon fe fe-file-plus"></i><span
                                class="side-menu__label">Laporan WBS</span>
                            <span class="badge bg-pink side-badge">{{ $totalPendingWbsReport }}</span>

                        </a>
                    </li>
                @endcan
                @canany(['upgCategory-index', 'upgReport-index'])
                    <li class="sub-category">
                        <h3>Unit Pelayanan Gratifikasi</h3>
                    </li>
                @endcan
                @can('upgBeranda-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['upgBeranda.*']) }}"
                            href="{{ route('upgBeranda.index') }}"><i class="side-menu__icon fe fe-file-plus"></i><span
                                class="side-menu__label">Tentang
                                UPG</span></a>
                    </li>
                @endcan
                @can('upgStep-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['upgStep.*']) }}"
                            href="{{ route('upgStep.index') }}"><i class="side-menu__icon fe fe-check-square"></i><span
                                class="side-menu__label">Tata Cara Pengaduan</span></a>
                    </li>
                @endcan
                @can('upgCategory-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['upgCategory.*']) }}"
                            href="{{ route('upgCategory.index') }}"><i class="side-menu__icon fe fe-file-plus"></i><span
                                class="side-menu__label">Kategori</span></a>
                    </li>
                @endcan
                @can('upgReport-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['upgReport.*']) }}"
                            href="{{ route('upgReport.index') }}"><i class="side-menu__icon fe fe-file-plus"></i><span
                                class="side-menu__label">Laporan</span>
                            <span class="badge bg-pink side-badge">{{ $totalUpg }}</span>
                        </a>
                    </li>
                @endcan
                @canany(['konsultasiAsistensiCategory-index', 'konsistenBeranda', 'pertemuan-index', 'konsultasi-index',
                    'konsistenStep-index'])
                    <li class="sub-category">
                        <h3>Konsisten</h3>
                    </li>
                @endcan
                @can('konsistenBeranda-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['konsistenBeranda.*']) }}"
                            href="{{ route('konsistenBeranda.index') }}"><i
                                class="side-menu__icon fe fe-file-plus"></i><span class="side-menu__label">Tentang</span>
                        </a>
                    </li>
                @endcan
                @can('konsistenStep-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['konsistenStep.*']) }}"
                            href="{{ route('konsistenStep.index') }}"><i
                                class="side-menu__icon fe fe-file-plus"></i><span class="side-menu__label">Tata
                                Cara</span>
                        </a>
                    </li>
                @endcan
                @can('konsultasiAsistensiCategory-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['konsultasiAsistensiCategory.*']) }}"
                            href="{{ route('konsultasiAsistensiCategory.index') }}"><i
                                class="side-menu__icon fe fe-file-plus"></i><span class="side-menu__label">Kategori</span>
                        </a>
                    </li>
                @endcan
                @can('pertemuan-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['pertemuan.*']) }}"
                            href="{{ route('pertemuan.index') }}">
                            <i class="side-menu__icon fe fe-file-plus">
                            </i>
                            <span class="side-menu__label">Pertemuan</span>
                            <span class="badge bg-pink side-badge">{{ $totalPertemuan }}</span>
                        </a>
                    </li>
                @endcan
                @can('konsultasi-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['konsultasi.*']) }}"
                            href="{{ route('konsultasi.index') }}">
                            <i class="side-menu__icon fe fe-file-plus"></i>
                            <span class="side-menu__label">Konsultasi & Asistensi</span>
                            <span class="badge bg-pink side-badge">{{ $totalPendingKonsultasi }}</span>
                        </a>
                    </li>
                @endcan
                @canany(['documentCategory-index'])
                    <li class="sub-category">
                        <h3>Dokumen</h3>
                    </li>
                @endcan
                @can('documentCategory-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['documentCategory.*']) }}"
                            href="{{ route('documentCategory.index') }}"><i class="side-menu__icon fe fe-book"></i><span
                                class="side-menu__label">Dokumen</span></a>
                    </li>
                @endcan
                @canany(['slider-index', 'link-index', 'beranda-index', 'master-index', 'profile-index'])
                    <li class="sub-category">
                        <h3>Website</h3>
                    </li>
                @endcan
                @can('slider-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['slider.*']) }}"
                            href="{{ route('slider.index') }}"><i class="side-menu__icon fe fe-image"></i><span
                                class="side-menu__label">Slider</span></a>
                    </li>
                @endcan
                @can('profile-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['profile.*']) }}"
                            href="{{ route('profile.index') }}"><i class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">Profile</span></a>
                    </li>
                @endcan
                @can('link-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['link.*']) }}" href="{{ route('link.index') }}"><i
                                class="side-menu__icon fe fe-link"></i><span class="side-menu__label">Link</span></a>
                    </li>
                @endcan
                @can('mediaLibrary-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['mediaLibrary.*']) }}"
                            href="{{ route('mediaLibrary.index') }}"><i class="side-menu__icon fe fe-camera"></i><span
                                class="side-menu__label">Media Library</span></a>
                    </li>
                @endcan
                @can('beranda-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['beranda.*']) }}"
                            href="{{ route('beranda.index') }}"><i class="side-menu__icon fe fe-monitor"></i><span
                                class="side-menu__label">Beranda</span></a>
                    </li>
                @endcan
                @can('master-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['master.*']) }}"
                            href="{{ route('master.index') }}"><i class="side-menu__icon fe fe-info"></i><span
                                class="side-menu__label">Master</span></a>
                    </li>
                @endcan
                @canany(['user-index', 'role-index', 'permission-index'])
                    <li class="sub-category">
                        <h3>User Management</h3>
                    </li>
                @endcan
                @can('user-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['user.*']) }}" href="{{ route('user.index') }}"><i
                                class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">User</span></a>
                    </li>
                @endcan
                @can('role-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['role.*']) }}" href="{{ route('role.index') }}"><i
                                class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Role</span></a>
                    </li>
                @endcan
                @can('permission-index')
                    <li>
                        <a class="side-menu__item {{ active_class(['permission.*']) }}"
                            href="{{ route('permission.index') }}"><i class="side-menu__icon fe fe-grid"></i><span
                                class="side-menu__label">Permission</span></a>
                    </li>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>
