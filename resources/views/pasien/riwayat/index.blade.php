@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Pasien <small>Riwayat Periksa</small></h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Riwayat Pemeriksaan Anda</h3>
            </div>
            <div class="card-body">
                <table id="riwayatTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Dokter</th>
                            <th>Tanggal Periksa</th>
                            <th>Keluhan</th>
                            <th>Diagnosa</th>
                            <th>Obat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayats as $i => $riwayat)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $riwayat->dokter->nama }}</td>
                                <td>{{ $riwayat->tanggal }}</td>
                                <td>{{ $riwayat->keluhan }}</td>
                                <td>{{ $riwayat->diagnosa }}</td>
                                <td>
                                    <ul>
                                        @foreach($riwayat->obats as $obat)
                                            <li>{{ $obat->nama }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
