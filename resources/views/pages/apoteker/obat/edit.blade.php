@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Obat</h1>
    <p class="mb-4">Manajemen Obat</p>

    <div class="card shadow">
        <div class="card-header">
            <h4>Edit</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('obat.update', $edit->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="col">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nama_obat">Nama Obat</label>
                                <input type="text" name="nama_obat" id="nama_obat" class="form-control"
                                    value="{{ $edit->nama_obat }}">
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
