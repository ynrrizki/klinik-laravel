@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <p class="mb-4">Manajemen User</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laravel Yanu

                <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData">Tambah
                    Data</button>
                </button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Akun Dibuat</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($user as $row)
                            <tr>
                                <td width="5%">{{ $no++ }}</td>
                                <td>{{ $row->nama_lengkap }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->level }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>

                                    <form action="{{ route('user.destroy', $row->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('user.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria- labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap"
                                name="nama_lengkap">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="username"
                                name="username">
                        </div>
                        <div class="form-group">

                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>

                            <select name="level" id="level" class="form-control">

                                <option value="" selected>Pilih</option>
                                <option value="ADMIN">Admin</option>
                                <option value="DOKTER">Dokter</option>
                                <option value="APOTEKER">Apoteker</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">

                    <button class="btn btn-secondary" type="button" data- dismiss="modal">Cancel</button>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        @push('addon-js')
            @if (session('userCreate'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: '{{ session('userCreate') }}'
                    })
                </script>
            @endif
            @if (session('userUpdate'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: '{{ session('userUpdate') }}'
                    })
                </script>
            @endif
            @if (session('userDelete'))
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: '{{ session('userDelete') }}'
                    })
                </script>
            @endif
        @endpush
    @endsection
