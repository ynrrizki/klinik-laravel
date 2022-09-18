@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pasien</h1>
    <p class="mb-4">Manajemen Pasien</p>
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
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($pasien as $row)
                            <tr>
                                <td width="5%">{{ $no++ }}</td>
                                <td>{{ $row->nama_pasien }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->umur }}</td>
                                <td>
                                    <form action="{{ route('pasien.destroy', $row->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('pasien.edit', $row->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah
                        Data User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pasien.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pasien" aria-describedby="nama_pasien"
                                name="nama_pasien" required>
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" class="form-control" id="umur" aria-describedby="umur" name="umur"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>

                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        @push('addon-js')
            @if (session('pasienCreate'))
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
                        title: '{{ session('pasienCreate') }}'
                    })
                </script>
            @endif
            @if (session('pasienUpdate'))
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
                        title: '{{ session('pasienUpdate') }}'
                    })
                </script>
            @endif
            @if (session('pasienDelete'))
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
                        title: '{{ session('pasienDelete') }}'
                    })
                </script>
            @endif
        @endpush
    @endsection
