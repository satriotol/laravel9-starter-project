<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>INSPEKTORAT - KOTA SEMARANG</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- master stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/responsive.css') }}">

    <!-- Whatsapp  stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/whatsapp-chat.css') }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/' . $master->logo) }}">
    <link rel="icon" type="image/png" href="{{ asset('uploads/' . $master->logo) }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('uploads/' . $master->logo) }}" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @stack('head')
    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
    @stack('css')
    <style>
        .breadcrumb-area {
            background: url('{{ asset('uploads/' . $master->banner) }}');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .px-0 {
            padding-right: 0;
            padding-left: 0;
        }

        .pl-0 {
            padding-left: 0;
        }

        .row-flex {
            display: flex;
            flex-wrap: wrap;
        }

        .text-red {
            color: #f60035;
            font-weight: bold;
        }

        .text-red-thin {
            color: #f60035;
        }

        .w-100 {
            width: 100%;
        }

        .h-100 {
            height: 100%;
        }
    </style>

</head>

<body>
    <div class="boxed_wrapper">
        <!--Start Preloader -->
        {{-- <div class="preloader"></div> --}}
        <!--End Preloader -->
        @include('frontend_layouts.header')
        <div id="example">
        </div>
        @yield('content')

        <!--Start footer area-->
        <footer class="footer-area" style="background-image:url({{ asset('uploads/' . $master->background) }});">
            <div class="footer-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer-top-content">
                                <div class="title pull-left">
                                    {{-- <h3>Over 20 years of experience we will ensure you always get the best.</h3> --}}
                                </div>
                                <div class="button pull-right">
                                    {{-- <a class="thm-btn bg-clr1" href="#">Book Consultation</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget pd-bottom">
                            <div class="footer-logo">
                                <a href="{{ route('beranda') }}">
                                    <img src="{{ asset('uploads/' . $master->logo) }}" alt="Awesome Footer Logo">
                                </a>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.234506719898!2d110.41097291459317!3d-6.98163059495637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4eefbc58d1%3A0x75b749227ffa9965!2sInspektorat%20Daerah%20Kota%20Semarang!5e0!3m2!1sen!2sid!4v1669857177820!5m2!1sen!2sid"
                                    width="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget wedo pd-left pd-bottom">
                            <div class="title">
                                <h3>Link Terkait</h3>
                            </div>
                            <ul class="we-do-list">
                                @foreach ($terkaitLinks as $terkaitLink)
                                    <li><a href="{{ $terkaitLink->url }}" target="_blank">{{ $terkaitLink->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget">
                            <div class="title">
                                <h3>Berita Terakhir</h3>
                            </div>
                            <ul class="latest-news-items">
                                @foreach ($latestBeritas as $latestBerita)
                                    <li>
                                        <a href="{{ route('detailBerita', $latestBerita->id) }}">
                                            {{ $latestBerita->title }}
                                        </a>
                                        <p>{{ $latestBerita->created_at }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget pd-top pd-left">
                            <div class="title">
                                <h3>Kontak Kami</h3>
                            </div>
                            <ul class="footer-contact-info">
                                <li>
                                    <div class="icon-holder">
                                        <span class="icon-technology-1"></span>
                                    </div>
                                    <div class="text-holder">
                                        <p>Telepon: {{ $master->phone }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-holder">
                                        <span class="icon-letter-1 bottom-envelop"></span>
                                    </div>
                                    <div class="text-holder">
                                        <p><a href="mailto:{{ $master->email }}"
                                                style="color: #c0c1c8;">{{ $master->email }}</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-holder">
                                        <i class="fa-brands fa-instagram" style="color: #f60035;"></i>
                                        {{-- <span class="icon-letter-1 bottom-envelop"></span> --}}
                                    </div>
                                    <div class="text-holder">
                                        <p><a href="https://www.instagram.com/inspektoratsemarangkota/?hl=en"
                                                target="_blank" style="color: #c0c1c8;">Instagram Inspektorat</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <section class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-bottom">
                            <div class="copyright-text pull-left">
                                <p>Copyrights © 2022 All Rights Reserved, Powered by <a
                                        href="https://semarangkota.go.id/" target="_blank">Semarang Kota</a>
                                </p>
                            </div>
                            <div class="footer-menu pull-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End footer bottom area-->

        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

        <!-- main jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('frontend_assets/js/jquery-1.11.1.min.js') }}"></script>
        <!-- Whatsapp -->
        <script src="{{ asset('frontend_assets/js/whatsapp-chat.js') }}"></script>
        <!-- bootstrap -->
        <script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
        <!-- bx slider -->
        <script src="{{ asset('frontend_assets/js/jquery.bxslider.min.js') }}"></script>
        <!-- count to -->
        <script src="{{ asset('frontend_assets/js/jquery.countTo.js') }}"></script>
        <!-- owl carousel -->
        <script src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}"></script>
        <!-- validate -->
        <script src="{{ asset('frontend_assets/js/validation.js') }}"></script>
        <!-- mixit up -->
        <script src="{{ asset('frontend_assets/js/jquery.mixitup.min.js') }}"></script>
        <!-- easing -->
        <script src="{{ asset('frontend_assets/js/jquery.easing.min.js') }}"></script>
        <!-- gmap helper -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHzPSV2jshbjI8fqnC_C4L08ffnj5EN3A"></script>
        <!--gmap script-->
        <script src="{{ asset('frontend_assets/js/gmaps.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/map-helper.js') }}"></script>
        <!-- fancy box -->
        <script src="{{ asset('frontend_assets/js/jquery.fancybox.pack.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/jquery.appear.js') }}"></script>
        <!-- isotope script-->
        <script src="{{ asset('frontend_assets/js/isotope.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/jquery.prettyPhoto.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/jquery.bootstrap-touchspin.js') }}"></script>
        <!-- jQuery timepicker js -->
        <script src="{{ asset('frontend_assets/assets/timepicker/timePicker.js') }}"></script>
        <!-- Bootstrap select picker js -->
        <script src="{{ asset('frontend_assets/assets/bootstrap-sl-1.12.1/bootstrap-select.js') }}"></script>
        <!-- Bootstrap bootstrap touchspin js -->
        <!-- jQuery ui js -->
        <script src="{{ asset('frontend_assets/assets/jquery-ui-1.11.4/jquery-ui.js') }}"></script>
        <!-- Language Switche  -->
        <script src="{{ asset('frontend_assets/assets/language-switcher/jquery.polyglot.language.switcher.js') }}"></script>
        <!-- Html 5 light box script-->
        <script src="{{ asset('frontend_assets/assets/html5lightbox/html5lightbox.js') }}"></script>

        <!-- revolution slider js -->
        <script src="{{ asset('frontend_assets/assets/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('frontend_assets/assets/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('frontend_assets/assets/revolution/js/extensions/revolution.extension.actions.min.js') }}">
        </script>
        <script src="{{ asset('frontend_assets/assets/revolution/js/extensions/revolution.extension.carousel.min.js') }}">
        </script>
        <script src="{{ asset('frontend_assets/assets/revolution/js/extensions/revolution.extension.kenburn.min.js') }}">
        </script>
        <script
            src="{{ asset('frontend_assets/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
        </script>
        <script src="{{ asset('frontend_assets/assets/revolution/js/extensions/revolution.extension.migration.min.js') }}">
        </script>
        <script src="{{ asset('frontend_assets/assets/revolution/js/extensions/revolution.extension.navigation.min.js') }}">
        </script>
        <script src="{{ asset('frontend_assets/assets/revolution/js/extensions/revolution.extension.parallax.min.js') }}">
        </script>
        <script src="{{ asset('frontend_assets/assets/revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
        </script>
        <script src="{{ asset('frontend_assets/assets/revolution/js/extensions/revolution.extension.video.min.js') }}">
        </script>
        <!-- thm custom script -->
        <script src="{{ asset('frontend_assets/js/custom.js') }}"></script>
        <script src="{{ asset('backend_assets/plugins/notify/js/rainbow.js') }}"></script>
        <script src="{{ asset('backend_assets/plugins/notify/js/sample.js') }}"></script>
        <script src="{{ asset('backend_assets/plugins/notify/js/jquery.growl.js') }}"></script>
        <script src="{{ asset('backend_assets/plugins/notify/js/notifIt.js') }}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        @if (session()->has('success'))
            <script>
                notif({
                    msg: "<b>Sukses:</b> Proses Anda Berhasil",
                    type: "success"
                });
            </script>
        @endif
        <script>
            $(function() {
                $('.form-group:has(input[required]) > label')
                    .after('<span class="text-red">*</span>')
                $('.form-group:has(select[required]) > label')
                    .after('<span class="text-red">*</span>')
                $('.form-group:has(textarea[required]) > label')
                    .after('<span class="text-red">*</span>')
            })
        </script>
        <script type="text/javascript">
            @foreach ($whatsappLinks as $whatsappLink)
                console.log(['name: {{ $whatsappLink->name }}']);
            @endforeach
            whatsappchat.multipleUser({
                selector: '#example',
                users: [
                    @foreach ($whatsappLinks as $whatsappLink)
                        {
                            'name': '{{ $whatsappLink->name }}',
                            'phone': '{{ $whatsappLink->whatsapp_url }}'
                        },
                    @endforeach
                ],
                headerMessage: 'Ada Pertanyaan? Silahkan hubungi <strong>WhatsApp</strong> Dibawah ini',
                color: '#25D366',
            });
        </script>
        @stack('custom-scripts')
        <script>
            AOS.init({
                duration: 1000, // values from 0 to 3000, with step 50ms
                easing: 'ease', // default easing for AOS animations
                once: true, // whether animation should happen only once - while scrolling down
            });
        </script>



    </div>
</body>

</html>
