@extends('layouts.master')

@section('title')
    <title>{{ $title }} | SIPESABA</title>
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('list-balita') }}">List balita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><a href="{{ route('list-balita') }}" class="btn btn-secondary ">
                            <span class="fa fa-arrow-left"></span> | Kembali
                        </a></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('store-balita') }}" method="POST" data-parsley-validate>
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_balita" class="col-md col-form-label">Nama Balita</label>
                                            <input type="text" class="form-control" name="nama_balita" id="">
                                        @error('nama_balita')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis_kelamin" class="col-md col-form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control"  id="jenis_kelamin" required>
                                                <option value="" disabled  selected >Pilih Jenis kelamin</option>
                                                <option value="L" >L</option>
                                                <option value="P" >P</option>

                                            </select>
                                        @error('jenis_kelamin')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="umur_bulan" class="col-md col-form-label">Umur (Bln)</label>
                                            <input type="number" class="form-control" name="umur_bulan"  id="">
                                        @error('umur_bulan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tinggi_badan" class="col-md col-form-label">Tinggi Badan (Cm)</label>
                                            <input type="text" class="form-control" name="tinggi_badan"  id="">
                                        @error('tinggi_badan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="berat_badan" class="col-md col-form-label">Berat Badan (Kg)</label>
                                            <input type="text" class="form-control" name="berat_badan"  id="">
                                        @error('berat_badan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="lingkar_lengan" class="col-md col-form-label">Lingkar Lengan (Cm)</label>
                                            <input type="text" class="form-control" name="lingkar_lengan" id="">
                                        @error('lingkar_lengan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection