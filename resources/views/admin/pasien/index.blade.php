@extends('layouts.app')

@section('content')
<div class="content-header"><h4>Manajemen Pasien</h4></div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Form Tambah Pasien --}}
<div class="card card-primary">
    <div class="card-header">Tambah Pasien</div>
    <form method="POST" action="{{ route('admin.pasien.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>No. KTP</label>
                <input name="no_ktp" class="form-control" required>
            </div>
            <div class="form-group">
                <label>No. HP</label>
                <input name="no_hp" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" required>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
        </div>
    </form>
</div>

{{-- Tabel Pasien --}}
<div class="card mt-4">
    <div class="card-header">Data Pasien</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead><tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. KTP</th>
                <th>No. HP</th>
                <th>No. RM</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr></thead>
            <tbody>
                @foreach($pasiens as $pasien)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pasien->name }}</td>
                        <td>{{ $pasien->alamat }}</td>
                        <td>{{ $pasien->no_ktp }}</td>
                        <td>{{ $pasien->no_hp }}</td>
                        <td>{{ $pasien->no_rm }}</td>
                        <td>{{ $pasien->email }}</td>
                        <td>
                            <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.pasien.destroy', $pasien->id) }}" method="POST" style="display:inline;">
                                @csrf 
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
