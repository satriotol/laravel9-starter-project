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
    </style>
@endpush
@section('content')
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area">
        <div class="container text-center">
            <h1>
                Layanan Informasi Publik
            </h1>
        </div>
    </section>
    <!--End breadcrumb area-->
    <section id="project-area" class="latest-project-area grid-with-text" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="project-filter post-filter text-center">
                        <li data-filter=".Berkala" class="active"><span>Informasi Berkala</span></li>
                        <li data-filter=".Setiap-Saat"><span>Informasi Setiap Saat</span></li>
                        <li data-filter=".Dikecualikan"><span>Informasi Dikecualikan</span></li>
                        <li data-filter=".Serta-Merta"><span>Informasi Serta Merta</span></li>
                    </ul>
                </div>
            </div>
            {{-- Looping buat type --}}
            <div class="row project-content masonary-layout filter-layout">
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 Berkala">
                    <div class="table">
                        <div class="sec-title">
                            <h2>Informasi Berkala</h2>
                            <span class="border"></span>
                        </div>
                       <ul>
                            @foreach ($berkalas as $berkala )

                                    <li>    <h4> {{ $berkala->name }} </h4>
                                    <ul>
                                        @foreach ($berkala->PpidInfopublics->where('category', 1) as $b)
                                        <li class= "textcolor"> {{ $b->name }}
                                            <ul>
                                            @foreach ($b->PpidInfopublicFiles as $PpidInfopublicsFile)
                                            <li class = "listicon listing"> <a href="{{ asset('uploads/' . $PpidInfopublicsFile->file) }}" class= "textcolor"
                                                target="_blank">{{ $PpidInfopublicsFile->name }}</a></li>
                                            @endforeach
                                            </ul>
                                        </li>
                                        @endforeach

                                    </ul>
                                    <li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 Setiap-Saat" style="display: none">
                    <div class="table">
                        <div class="sec-title">
                            <h2>Informasi Setiap Saat</h2>
                            <span class="border"></span>
                        </div>
                        <ul>
                            @foreach ($setiapsaats as $setiapsaat )
                                    <li>    <h4> {{ $setiapsaat->name }} </h4>
                                    <ul>
                                        @foreach ($setiapsaat->PpidInfopublics->where('category', 2) as $s)
                                        <li class= "textcolor"> {{ $s->name }}
                                            <ul>
                                            @foreach ($s->PpidInfopublicFiles as $PpidInfopublicsFile)
                                            <li class = "listicon listing"> <a href="{{ asset('uploads/' . $PpidInfopublicsFile->file) }}" class= "textcolor"
                                                target="_blank">{{ $PpidInfopublicsFile->name }}</a></li>
                                            @endforeach
                                            </ul>
                                        </li>
                                        @endforeach

                                    </ul>
                                    <li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 Dikecualikan" style="display: none">
                    <div class="table">
                        <div class="sec-title">
                            <h2>Informasi Dikecualikan</h2>
                            <span class="border"></span>
                        </div>
                        <ul>
                            @foreach ($dikecualikans as $dikecualikan )
                                    <li>    <h4> {{ $dikecualikan->name }} </h4>
                                    <ul>
                                        @foreach ($dikecualikan->PpidInfopublics->where('category', 3) as $k)
                                        <li class= "textcolor"> {{ $k->name }}
                                            <ul>
                                            @foreach ($k->PpidInfopublicFiles as $PpidInfopublicsFile)
                                            <li class = "listicon listing"> <a href="{{ asset('uploads/' . $PpidInfopublicsFile->file) }}" class= "textcolor"
                                                target="_blank">{{ $PpidInfopublicsFile->name }}</a></li>
                                            @endforeach
                                            </ul>
                                        </li>
                                        @endforeach

                                    </ul>
                                    <li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 Serta-Merta" style="display: none">
                    <div class="table">
                        <div class="sec-title">
                            <h2>Informasi Serta Merta</h2>
                            <span class="border"></span>
                        </div>
                        <ul>
                            @foreach ($sertamertas as $sertamerta )
                                    <li>    <h4> {{ $sertamerta->name }} </h4>
                                    <ul>
                                        @foreach ($sertamerta->PpidInfopublics->where('category', 4) as $t)
                                        <li class= "textcolor"> {{ $t->name }}
                                            <ul>
                                            @foreach ($t->PpidInfopublicFiles as $PpidInfopublicsFile)
                                            <li class = "listicon listing"> <a href="{{ asset('uploads/' . $PpidInfopublicsFile->file) }}" class= "textcolor"
                                                target="_blank">{{ $PpidInfopublicsFile->name }}</a></li>
                                            @endforeach
                                            </ul>
                                        </li>
                                        @endforeach

                                    </ul>
                                    <li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                 {{-- <div class="col-lg-3 col-md-4 col-sm-7 col-xs-12">
                    <div class="sidebar-wrapper">
                        <!--Start single sidebar-->
                        <div class="single-sidebar">
                            <form class="search-form" action="">
                                <input placeholder="Cari..." value="{{ @old('search') }}" type="text" name="search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>
@endsection
