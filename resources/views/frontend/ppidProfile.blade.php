@extends('frontend_layouts.main')
@section('content')
    <section class="breadcrumb-area" style="">
        <div class="container text-center">
            <h1>
                Profil PPID
            </h1>
        </div>
    </section>
    <!--Start company overview area-->
    <section class="company-overview-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-box">
                        {!! $ppidProfile->description !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@push('custom-scripts')
@endpush
