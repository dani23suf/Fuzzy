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
                    <p class="text-subtitle text-muted">{{ $subtitle }}</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">

                <div class="mt-4 ms-4">
                    <a  href="{{ route('create-balita') }}" class="btn btn-outline-primary" >
                        Tambah Data
                    </a>
                </div>
                
              
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Balita</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Umur Balita (Bln)</th>
                                <th class="text-center">Berat Badan </th>
                                <th class="text-center">Tinggi Badan</th>
                                <th class="text-center">Lingkar Lengan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($balita as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->nama}}</td>
                                    <td class="text-center">{{ $item->jenis_kelamin}}</td>
                                    <td class="text-center">{{ $item->umur_bulan}}</td>
                                    <td class="text-center">{{ $item->tinggi_badan }} cm</td>
                                    <td class="text-center">{{ $item->berat_badan }} kg</td>
                                    <td class="text-center">{{ $item->lingkar_lengan }} cm</td>
                                    <td class="d-flex justify-content-around align-items-center" style="height: 199.117px">
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                                <a href="{{ route('edit-balita',['id'=>$item->id]) }}" class="btn btn-sm">
                                                    <span class="fa-fw select-all fas"></span>
                                                </a>
                                            </dt>
                                            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name">Edit
                                            </dd>
                                        </dl>
                                        <dl class="dt ma0 pa0 text-center">
                                            <dt class="the-icon">
                                                <form method="POST" action="{{ route('destroy-balita',['id' => $item->id]) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm">
                                                        <span class="fa-fw select-all fas"></span>
                                                    </button>
                                                </form>
                                            </dt>
                                            <dd class="mt-2 text-sm select-all word-wrap dtc v-top tl f2 icon-name">Hapus
                                            </dd>
                                        </dl>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection


