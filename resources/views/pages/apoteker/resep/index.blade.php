@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Resep Obat</h1>
    <p class="mb-4">Manajemen Resep Obat</p>
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
                            {{-- keluhan_pasien --}}
                            <th>Keluhan</th>
                            {{-- hasil_diagnosa --}}
                            <th>Sakit</th>
                            {{-- nama_obat --}}
                            <th>Nama Obat</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($resep as $row)
                            <tr>
                                <td width="5%">{{ $no++ }}</td>
                                <td>{{ $row->berobat->keluhan_pasien }}</td>
                                <td>{{ $row->berobat->hasil_diagnosa }}</td>
                                <td>{{ $row->obat->nama_obat }}</td>
                                <td>
                                    <form action="{{ route('resep-obat.destroy', $row->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('resep-obat.edit', $row->id) }}"
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
                        Riwayat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('resep-obat.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="berobat_id">Sakit</label>
                            <select name="berobat_id" id="berobat_id" class="form-control" required>
                                <option value="" selected>Nama Sakit</option>
                                @foreach ($berobat as $item)
                                    <option value="{{ $item->id }}">{{ $item->hasil_diagnosa }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="obat_id">Nama Obat</label>
                            <select name="obat_id" id="obat_id" class="form-control" required>
                                <option value="" selected>Nama Obat</option>
                                @foreach ($obat as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                @endforeach
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
            {{-- @if (session('resepCreate'))
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
                        title: '{{ session('resepCreate') }}'
                    })
                </script>
            @endif
            @if (session('resepUpdate'))
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
                        title: '{{ session('resepUpdate') }}'
                    })
                </script>
            @endif
            @if (session('resepDelete'))
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
                        title: '{{ session('resepDelete') }}'
                    })
                </script>
            @endif --}}
        @endpush
    @endsection
