@extends('layouts.auth')

@section('content')
        <div class="content-wrapper container">

            <div class="page-heading">
               
            </div>
            <div class="page-content">
                <section class="row justify-content-center">
                    <div class="col-md-10">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-head">
                                    <div class="row text-center mt-4">
                                     <div class="col-md-12 ml-4">
                                         <h6 class="fw-bold fs-4 ">Registrasi Akun</h6>
                                     </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Nama Lengkap" value="{{ old('name') }}">
                                                    @error('name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    placeholder="Email" value="{{ old('email') }}">
                                                    @error('email')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="kota">Kota</label>
                                                <input type="text" class="form-control" name="kota" id="kota"
                                                    placeholder="kota Lahir" value="{{ old('kota') }}">
                                                    @error('kota')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username"
                                                    id="username" placeholder="Username" value="{{ old('username') }}">
                                                    @error('username')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir"
                                                    id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                                    @error('tanggal_lahir')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                         
                                            <div class="form-group mb-4">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" placeholder="Password" value="{{ old('password') }}">
                                                    @error('password')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror 
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                    <a href="{{ route('login') }}" class="text-info" >sudah punya akun ?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </section>
            </div>

        </div>
@endsection


