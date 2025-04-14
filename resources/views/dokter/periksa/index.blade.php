@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Dokter <small>Periksa</small></h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Periksa</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive"> <!-- Menambahkan table-responsive agar tabel scrollable -->
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID Periksa</th>
                                <th>Pasien</th>
                                <th>Tanggal Periksa</th>
                                <th>Catatan</th>
                                <th>Biaya Periksa</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Contoh dummy data, bisa diganti dengan looping --}}
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>Anis</td>
                                <td>2025-04-07 14:20:44</td>
                                <td>Pasien mengalami batuk.</td>
                                <td>{{ number_format(50000) }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2</td>
                                <td>Ganjar</td>
                                <td>2025-04-06 09:10:49</td>
                                <td>Pasien mengalami pusing.</td>
                                <td>{{ number_format(50000) }}</td>
                            </tr>
                            {{-- End dummy --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
