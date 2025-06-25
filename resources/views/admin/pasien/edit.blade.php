@extends('layouts.app')

@section('content')
<div class="content-header"><h4>Edit Data Pasien</h4></div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card card-primary">
    <div class="card-header">Form Edit Pasien</div>
    <form method="POST" action="{{ route('admin.pasien.update', $pasien->id) }}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input name="name" class="form-control" value="{{ $pasien->name }}" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" class="form-control" value="{{ $pasien->alamat }}" required>
            </div>
            <div class="form-group">
                <label>No HP</label>
                <input name="no_hp" class="form-control" value="{{ $pasien->no_hp }}" required>
            </div>
            <div class="form-group">
                <label>No KTP</label>
                <input name="no_ktp" class="form-control" value="{{ $pasien->no_ktp }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control" value="{{ $pasien->email }}" required>
            </div>
            {{-- Tidak edit password di sini --}}
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
            <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
