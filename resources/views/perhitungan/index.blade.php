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
                   
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('proses-perhitungan') }}" method="POST" data-parsley-validate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-12    col-12">
                                        <div class="form-group">
                                            <label for="balita" class="col-md col-form-label">Nama Balita</label>
                                            <select name="balita" class="form-control" id="balita" required>
                                                <option value="" disabled selected>Pilih Balita</option>
                                                @foreach($balitas as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        @error('balita')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Cek Status Gizi</button>
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

@push('scripts')
    <script>
         $('#balita').select2();
    </script>
@endpush