@extends('layouts.app')
@section('title', 'Waktu Sholat')
@section('nav-sholat')
    class="active"
@endsection

@section('content')
    <section class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h4><b style="border-bottom: solid; width:">Waktu Sholat</b></h4>
        </div>
    </section>

    <div class="container mb-5" style="margin-top: -30px;">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Waktu Sholat, Waktu Indonesia Bagian Barat</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive border">
                    <table class="table table-striped">
                        <thead>
                            <tr  class="table-active">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Imsak</th>
                                <th>Subuh</th>
                                <th>Dzuhur</th>
                                <th>Ashar</th>
                                <th>Maghrib</th>
                                <th>Isya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                // dd($wsholats['results'])
                            @endphp
                            @foreach ($wsholats['results']['datetime'] as $wsholat)
                                <tr>
                                    <td>@php echo $i; @endphp</td>
                                    <td>{{$wsholat['date']['gregorian']}}</td>
                                    <td>{{$wsholat['times']['Imsak']}}</td>
                                    <td>{{$wsholat['times']['Fajr']}}</td>
                                    <td>{{$wsholat['times']['Dhuhr']}}</td>
                                    <td>{{$wsholat['times']['Asr']}}</td>
                                    <td>{{$wsholat['times']['Maghrib']}}</td>
                                    <td>{{$wsholat['times']['Isha']}}</td>
                                </tr>

                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection