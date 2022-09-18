@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <p class="mb-4">Manajemen User</p>

    <div class="card shadow">
        <div class="card-header">
            <h4>Edit</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('riwayat-berobat.update', $edit->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="col">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="pasien_id">Nama Pasien</label>
                                <select name="pasien_id" id="pasien_id" class="form-control" required>
                                    <option value="" selected>Nama Pasien</option>
                                    @foreach ($pasien as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $edit->pasien->id == $item->id ? 'selected' : '' }}>{{ $item->nama_pasien }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dokter_id">Dokter Penangan</label>
                                <select name="dokter_id" id="dokter_id" class="form-control" required>
                                    <option value="" selected>Dokter Penangan</option>
                                    @foreach ($dokter as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $edit->dokter->id == $item->id ? 'selected' : '' }}>{{ $item->nama_dokter }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tgl_berobat">Tanggal Berobat</label>
                                <input type="date" name="tgl_berobat" id="tgl_berobat" class="form-control"
                                    value="{{ $edit->tgl_berobat }}">
                            </div>
                            <div class="form-group">
                                <label for="keluhan_pasien">Keluhan Pasien</label>
                                <input type="text" name="keluhan_pasien" id="keluhan_pasien" class="form-control"
                                    value="{{ $edit->keluhan_pasien }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="hasil_diagnosa">Hasil Diagnosa</label>
                                <input type="text" name="hasil_diagnosa" id="hasil_diagnosa" class="form-control"
                                    value="{{ $edit->hasil_diagnosa }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary w-50 my-5">Simpan</button>
                </div>

            </form>
        </div>
    </div>
@endsection
