@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Pasien <small>Periksa</small></h1>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Periksa</h3></div>
            <form method="POST" action="/pasien/periksa">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Anda</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda">
                    </div>
                    <div class="form-group">
                        <label for="dokter">Pilih Dokter</label>
                        <select class="form-control" id="dokter" name="dokter_id">
                            <option value="1">Dokter 1</option>
                            <option value="2">Dokter 2</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
