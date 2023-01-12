@extends('frontend_layouts.main')
@section('content')
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area">
        <div class="container text-center">
            <h1>
                {{ $documentCategory->name }}
            </h1>
        </div>
    </section>
    <!--End breadcrumb area-->
    <section class="checkout-area" style="padding-top: 0" id="app">
        <div class="container">
            <div class="row bottom row-flex">
                <div class="col-md-6">
                    <div class="table">
                        <div class="sec-title">
                            <h2>{{ $documentCategory->name }}</h2>
                            <span class="border"></span>
                        </div>
                        <table class="cart-table">
                            <thead class="cart-header">
                                <tr>
                                    <th>Nama Dokumen @{{ message }}</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documentCategory->documents as $document)
                                    <tr>
                                        <td>{{ $document->name }}</td>
                                        <td>
                                            <button @click="link = '{{ asset('uploads/' . $document->file) }}'"
                                                class="btn btn-info">Buka
                                                File</button>
                                            <a href="{{ asset('uploads/' . $document->file) }}" target="_blank"
                                                class="btn btn-danger">Download</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <iframe :src="this.link" width="100%" height="600px">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('custom-scripts')
    <script type="module">
    import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
  
    createApp({
      data() {
        return {
          link: '{{ asset('uploads/' . $documentCategory->documents->first()->file) }}'
        }
      }
    }).mount('#app')
  </script>
@endpush
