@extends('frontend_layouts.main')
@section('content')
    <div id="app">
        <section class="breadcrumb-area" style="">
            <div class="container text-center">
                <h1>
                    WBS
                </h1>
            </div>
        </section>
        <section class="company-overview-area" style="padding-bottom: 20px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content-box">
                            {!! $wbsBeranda->description !!}
                        </div>
                        <a class="thm-btn bg-clr1" href="{{ route('wbsReport.index') }}" target="_blank"
                            style="width: 100%;padding:1rem">Buat Pengaduan</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="single-service-area" class="business-planning-area" style="padding-top: 0px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-7 col-xs-12">
                        <div class="left-sidebar">
                            <!--Start single sidebar-->
                            <div class="single-sidebar">
                                <ul class="page-link">
                                    <li>
                                        <a :class="{ 'active': routeName == 'TENTANG' }" @click="routeName = 'TENTANG'">
                                            Tentang WBS
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a :class="{ 'active': routeName == 'PENGADUAN' }" @click="routeName = 'PENGADUAN'">
                                            Tata Cara Pengaduan
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <div class="content-box">
                            <div class="row" v-if="routeName == 'TENTANG'">
                                <div class="top-content">
                                    <div class="col-md-12">
                                        <div class="text-holder">
                                            {!! $wbsAbout->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" v-if="routeName == 'PENGADUAN'">
                                <div class="col-md-12">
                                    <div class="accordion-box">
                                        @foreach ($wbsSteps as $wbsStep)
                                            <div class="accordion accordion-block">
                                                <div class="accord-btn active">
                                                    <h4>{{ $wbsStep->number }}</h4>
                                                </div>
                                                <div class="accord-content collapsed">
                                                    {!! $wbsStep->description !!}
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('custom-scripts')
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.7/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"
        integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const {
            createApp
        } = Vue

        createApp({
            data() {
                return {
                    routeName: "TENTANG",
                    captchaImage: '',
                }
            },
            mounted() {},
            methods: {},
        }).mount('#app')
    </script>
@endpush
