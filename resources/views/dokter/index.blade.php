@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Dokter <small>Dashboard</small></h1>
    </section>

    <section class="content">
        <div class="row">
            @php
                $info = [
                    ['title' => 'Jumlah Riwayat Periksa', 'count' => 2, 'bg' => 'info'],
                    ['title' => 'Bounce Rate', 'count' => '70%', 'bg' => 'success'],
                    ['title' => 'User Registrations', 'count' => 5, 'bg' => 'warning'],
                    ['title' => 'Unique Visitors', 'count' => 10, 'bg' => 'danger']
                ];
            @endphp

            @foreach($info as $box)
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-{{ $box['bg'] }}">
                        <div class="inner">
                            <h3>{{ $box['count'] }}</h3>
                            <p>{{ $box['title'] }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
