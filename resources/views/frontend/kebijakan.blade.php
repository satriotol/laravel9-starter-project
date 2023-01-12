@extends('frontend_layouts.main')
@section('content')
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area">
        <div class="container text-center">
            <h1>
                Kebijakan
                @isset($kebijakancategories)
                    / {{ $kebijakancategories->name }}
                @endisset
            </h1>
        </div>
    </section>
    <!--End breadcrumb area-->
    <section class="checkout-area" style="padding-top: 0">
        <div class="container">
            <div class="row bottom">
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="table">
                        <div class="sec-title">
                            <h2>{{ $kebijakancategories->name }}</h2>
                            <span class="border"></span>
                        </div>
                        <table class="cart-table">
                            <thead class="cart-header">
                                <tr>
                                    <th>Nama</th>
                                    <th>Tema</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kebijakans as $kebijakan)
                                    <tr>
                                        <td>{{ $kebijakan->name }}</td>
                                        <td>
                                            @foreach ($kebijakan->temas as $tema)
                                                <div class="badge bg-clr1">
                                                    {{ $tema->name }}
                                                </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('detailKebijakan', $kebijakan->id) }}"
                                                class="btn btn-info">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-7 col-xs-12">
                    <div class="sidebar-wrapper">
                        <!--Start single sidebar-->
                        <div class="single-sidebar">
                            <form class="search-form" action="">
                                <input placeholder="Cari..." value="{{ @old('search') }}" type="text" name="search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
