@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Dokter <small>Obat</small></h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Periksa</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dokter.obat.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Obat</label>
                                <input type="text" name="name_obat" class="form-control" placeholder="Input obat's name">
                            </div>
                            <div class="form-group">
                                <label>Kemasan</label>
                                <input type="text" name="kemasan" class="form-control" placeholder="Input kemasan's name">
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" placeholder="Input the price">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Obat</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Obat</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Kemasan</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($obats ?? [] as $obat)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ 'B00' . $obat->id }}</td>
                                    <td>{{ $obat->name_obat }}</td>
                                    <td>{{ $obat->kemasan }}</td>
                                    <td>{{ number_format($obat->harga) }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="#" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @if(empty($obats) || $obats->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data obat.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
