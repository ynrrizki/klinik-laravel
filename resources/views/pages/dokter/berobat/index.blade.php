@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Riwayat Berobat</h1>
    <p class="mb-4">Riwayat Berobat</p>
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
                            <th>Dokter Penangan</th>
                            <th>Tanggal Berobat</th>
                            <th>Keluhan Pasien</th>
                            <th>Hasil Diagnosa</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($berobat as $row)
                            <tr>
                                <td width="5%">{{ $no++ }}</td>
                                <td>{{ $row->pasien->nama_pasien }}</td>
                                <td>{{ $row->dokter->nama_dokter }}</td>
                                <td>{{ $row->tgl_berobat }}</td>
                                <td>{{ $row->keluhan_pasien }}</td>
                                <td>{{ $row->hasil_diagnosa }}</td>
                                <td>
                                    <form action="{{ route('riwayat-berobat.destroy', $row->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('riwayat-berobat.edit', $row->id) }}"
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
                    <form action="{{ route('riwayat-berobat.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="pasien_id">Nama Pasien</label>
                            <select name="pasien_id" id="pasien_id" class="form-control" required>
                                <option value="" selected>Nama Pasien</option>
                                @foreach ($pasien as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_pasien }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dokter_id">Dokter Penangan</label>
                            <select name="dokter_id" id="dokter_id" class="form-control" required>
                                <option value="" selected>Dokter Penangan</option>
                                @foreach ($dokter as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_dokter }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_berobat">Tanggal Berobat</label>
                            <input type="date" name="tgl_berobat" id="tgl_berobat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="keluhan_pasien">Keluhan Pasien</label>
                            <input type="text" name="keluhan_pasien" id="keluhan_pasien" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="hasil_diagnosa">Hasil Diagnosa</label>
                            <input type="text" name="hasil_diagnosa" id="hasil_diagnosa" class="form-control">
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
            @if (session('berobatCreate'))
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
                        title: '{{ session('berobatCreate') }}'
                    })
                </script>
            @endif
            @if (session('berobatUpdate'))
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
                        title: '{{ session('berobatUpdate') }}'
                    })
                </script>
            @endif
            @if (session('berobatDelete'))
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
                        title: '{{ session('berobatDelete') }}'
                    })
                </script>
            @endif
        @endpush
    @endsection
