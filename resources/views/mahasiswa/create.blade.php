@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')
@section('content')
    <div class="card form-container">
        <div class="card-header">
            <h3 class="card-title text-center"> Tambah Data </h3>
        </div>

        <div class="card-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label"> Nama </label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="nim" class="form-label"> NIM </label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label"> Alamat </label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-success"> Simpan </button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary"> Kembali </a>
            </form>
        </div>
    </div>
@endsection