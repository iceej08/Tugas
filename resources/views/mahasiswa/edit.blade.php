@extends('layouts.app')

@section('title', 'Edit Data')

@section('content')
    <div class="card form-container">
        <div class="card-header">
            <h3 class="card-title text-center"> Edit Data </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.update', $mhs->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label"> Nama </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $mhs->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label"> NIM </label>
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ $mhs->nim }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label"> Alamat </label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $mhs->alamat }}</textarea>
                </div>
                <button type="submit" class="btn btn-success"> Update </button>
                <a href="{{ route('mahasiswa.index', $mhs->id) }}" class="btn btn-secondary"> Kembali </a>
            </form>
        </div>
    </div>
@endsection