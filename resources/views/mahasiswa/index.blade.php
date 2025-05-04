@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title text-center"> Data Mahasiswa 
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-success float-end"> Tambah </a>
        </h3>
        
    </div>

    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>

            @foreach($mhs as $mahasiswa)
            <tr>
                <td>{{ $mahasiswa->id }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->alamat }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}"
                    class="btn btn-warning"> Edit </a>

                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}"
                    method="POST" class="d-inline">
                    @csrf
                    @method('DELETE') 
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin dihapus?')"> Delete </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection