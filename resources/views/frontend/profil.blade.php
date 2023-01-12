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
                Profil
            </h1>
        </div>
    </section>
    <!--Start company overview area-->
    <section class="company-overview-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-box">
                        <div class="accordion-box">
                            @foreach ($profiles as $profile)
                                @if ($profile->type == 'Halaman')
                                    <div class="accordion accordion-block">
                                        <div class="accord-btn">
                                            <h4>{{ $profile->name }}</h4>
                                        </div>
                                        <div class="accord-content">
                                            {!! $profile->description !!} </div>
                                    </div>
                                @else
                                    <div class="accordion accordion-block">
                                        <div class="accord-btn">
                                            <h4>{{ $profile->name }}</h4>
                                        </div>
                                        <div class="accord-content">
                                            <iframe src="{{ $profile->link }}" frameborder="0" width="100%"
                                                height="500px"></iframe>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@push('custom-scripts')
@endpush
