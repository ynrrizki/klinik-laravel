@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Obat</h1>
    <p class="mb-4">Manajemen Obat</p>
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
                            {{-- nama_obat --}}
                            <th>Nama Obat</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($obat as $row)
                            <tr>
                                <td width="5%">{{ $no++ }}</td>
                                <td>{{ $row->nama_obat }}</td>
                                <td>
                                    <form action="{{ route('obat.destroy', $row->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('obat.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
                        Obat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('obat.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <input type="text" name="nama_obat" id="nama_obat" class="form-control">
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
            @if (session('obatCreate'))
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
                        title: '{{ session('obatCreate') }}'
                    })
                </script>
            @endif
            @if (session('obatUpdate'))
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
                        title: '{{ session('obatUpdate') }}'
                    })
                </script>
            @endif
            @if (session('obatDelete'))
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
                        title: '{{ session('obatDelete') }}'
                    })
                </script>
            @endif
        @endpush
    @endsection
