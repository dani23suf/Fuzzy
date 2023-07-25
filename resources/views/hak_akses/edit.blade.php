@extends('layouts.master')

@push('css')
    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/"> --}}

    {{-- <link href="{{ asset('template/sign-in') }}/signin.css" rel="stylesheet"> --}}
@endpush()

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list.user') }}">Users</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list.user') }}">List Users</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <form class="form-signin-new" method="POST"
                                action="{{ route('updateUser', ['id' => $user->id]) }}">
                                @csrf
                                @method('put')

                                <h1 class=" h3 mb-4 font-weight-normal text-center"> EDIT USER</h1>

                                <div class="row">
                                    <div class="col-md-6">
                                         <div>
                                            <label for="username" class="mb-3">{{ __('Username') }}</label>
                                            <input type="text" id="username" class="form-control @error('username') is-invalid @enderror"
                                                name="username" placeholder="Username" value="{{ $user->username }}" required
                                                autocomplete="username" autofocus>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label for="name" class="mb-3">{{ __('Name') }}</label>
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                name="name" placeholder="Name" value="{{ $user->name }}" required
                                                autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-md-6 mt-3">
                                        <div class="">
                                            <label for="kota" class="mb-3">{{ __('Kota') }}</label>
                                            <input type="text" id="kota" class="form-control @error('kota') is-invalid @enderror"
                                                name="kota" placeholder="Kota" value="{{ $user->kota }}" required
                                                autocomplete="kota" autofocus>
                                            @error('kota')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div class="">
                                            <label for="tanggal_lahir" class="mb-3">{{ __('Tanggal Lahir') }}</label>
                                            <input type="date" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('Y-m-d') }}" required
                                                autocomplete="tanggal_lahir" autofocus>
                                            @error('tanggal_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                              
                                </div>
                               
                                
                                {{-- <div class="mt-3">
                                    <label for="email" class="sr-only">{{ __('Email Address') }}</label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email Address" value="{{ $user->email }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}

                                @if (auth()->user()->email == $user->email)
                                @else
                                    <div class="mt-3">
                                        <label for="position-option" class="">{{ __('Role') }}</label>
                                        <select class="form-control @error('course_id') is-invalid @enderror" id="role"
                                            required name="role">
                                            <option readonly value="" placeholder="Choose Role">Choose Roles</option>

                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ $user->role_id== $role->id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @endif
                                {{-- <div class="mt-3">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <label for="password-confirm" class="sr-only">Confirmation Password</label>
                                    <input type="password" id="password-confirm"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirmation Password">
                                </div> --}}
                                <br>
                                <div class="mt-3">
                                    <div class="">
                                        <button type="submit" class="btn btn-lg btn-outline-primary btn-sm btn-block">
                                            {{ __('Update') }}
                                        </button>

                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    {{--  --}}
@endsection()
