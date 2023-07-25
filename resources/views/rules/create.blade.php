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
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('list-rules') }}">List Rules</a></li>
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
                        <h4 class="card-title"><a href="{{ route('list-rules') }}" class="btn btn-secondary ">
                            <span class="fa fa-arrow-left"></span> | Kembali
                        </a></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('store-rules') }}" method="POST" data-parsley-validate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="umur" class="col-md col-form-label">Umur</label>
                                            <select name="umur" class="form-control" id="umur" required>
                                                <option value="" disabled selected>Pilih Fase</option>
                                                @foreach($umur as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        @error('umur')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="berat_badan" class="col-md col-form-label">Berat Badan</label>
                                            <select name="berat_badan" class="form-control"  id="berat_badan" required>
                                                <option value="" disabled selected>Pilih Berat Badan</option>
                                                @foreach($beratBadan as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        @error('berat_badan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tinggi_badan" class="col-md col-form-label">Tinggi Badan</label>
                                            <select name="tinggi_badan" class="form-control"  id="tinggi_badan" required>
                                                <option value="" disabled selected>Pilih Tinggi Badan</option>
                                                @foreach($tinggiBadan as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        @error('tinggi_badan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="lingkar_lengan" class="col-md col-form-label">Lingkar Lengan</label>
                                            <select name="lingkar_lengan" class="form-control"  id="lingkar_lengan" required>
                                                <option value="" disabled selected>Pilih Lingkar Lengan</option>
                                                @foreach($lingkarLengan as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        @error('lingkar_lengan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="status_gizi" class="col-md col-form-label">Status Gizi</label>
                                            <select name="status_gizi" class="form-control"  id="status_gizi" required>
                                                <option value="" disabled selected  >Pilih Status Gizi</option>
                                                @foreach($statusGizi as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        @error('status_gizi')
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