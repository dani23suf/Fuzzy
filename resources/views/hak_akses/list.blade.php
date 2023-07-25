@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endpush()

@section('title')
    <title>{{ $title }} | SIPESABA</title>
@endsection


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman List User</h1>
                </div><!-- /.col -->
                {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list.user') }}">Users</a></li>
                        <li class="breadcrumb-item active">List User</li>
                    </ol>
                </div><!-- /.col --> --}}
            </div><!-- /.row -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    {{--  --}}

    {{--  --}}

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    {{-- <h5>Featured</h5> --}}
                                </div>
                                {{-- <div class="col-6">
                                    <a href="{{ route('admin.resetPassword') }}"
                                        class="btn btn-danger float-right text-white">Reset Password</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table  table-bordered " style="width:100%">
                                <thead>
                                    <tr >
                                        <th class="text-center">No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">email</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                    @forelse ($users as $user)
                                        <tr class="text-center">
                                            <td>{{ ++$count }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->roles->name }}</td>
                                            <td>
                                                <a href="{{ route('editUser', ['id' => $user->id]) }}"
                                                    class="btn btn-outline-info btn-sm"><i class="fa fa-pen"></i>
                                                    Edit</a>
                                                {{-- <a href="{{ route('admin.showResetPassword', ['id' => $user->id]) }}"
                                                    class="btn btn-outline-success btn-sm"><i class="fa fa-lock"></i>
                                                    Reset</a> --}}
                                                <a href=" {{ route('deleteUser', ['id' => $user->id]) }}"
                                                    class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Are you sure delete this user ?');"><i
                                                        class="fa fa-trash"></i> Delete</a>

                                            </td>


                                        </tr>
                                    @empty
                                    @endforelse




                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection()

@push('scripts')

    <script>
        $(document).ready(function() {
            // $.noConflict();
            var table = $('#example').DataTable();
        });
    </script>
    {{-- @if (session()->has('error')) 
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session()->get('error') }}'
            });
        </script>
@elseif((session()->has('success')) )

<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session()->get('success') }}'
            });
        </script> --}}

{{-- @endif --}}
@endpush
