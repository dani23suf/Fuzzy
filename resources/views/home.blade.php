@extends('layouts.auth')

@section('title')
    <title>{{ $title }} | SPDTK</title>
@endsection

@section('content')

        <div class="content-wrapper container">

            <div class="page-heading d-flex align-items-center">
                <span class="fw-bold fs-4">{{ $title }}</span>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="row">
                                <div class="d-flex align-items-center justify-content-around">
                                    <img class="img-fluid" src="{{ asset('dist/assets/images/logo/unitomo.png') }}" alt="Pedoman" style="height:370px;object-fit:contain">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Selamat datang di SIPATUBA</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <p>Sipatuba adalah aplikasi yang dibuat untuk diagnosa gangguan tumbuh kembang pada
                                    balita.</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Informasi Tumbuh Kembang</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <p>Untuk melihat informasi tumbuh kembang pada balita, klik <a
                                        href="">link tautan dibawah ini.</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    @endsection