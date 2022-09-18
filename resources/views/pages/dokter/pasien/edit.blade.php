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
            <form action="{{ route('pasien.update', $edit->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="col">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama_pasien">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama_pasien" aria-describedby="nama_pasien"
                                    name="nama_pasien" value="{{ $edit->nama_pasien }}">
                            </div>
                            <div class="form-group">
                                <label for="umur">Umur</label>
                                <input type="text" class="form-control" id="umur" aria-describedby="umur"
                                    name="umur" value="{{ $edit->umur }}">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="jenis_kelamin">Level</label>

                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="pria" {{ $edit->jenis_kelamin == 'pria' ? 'selected' : '' }}>Pria
                                    </option>
                                    <option value="wanita" {{ $edit->jenis_kelamin == 'wanita' ? 'selected' : '' }}>Wanita
                                    </option>
                                </select>
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
