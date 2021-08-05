@extends('layouts.app')
@section('title', 'Agenda')
@section('nav-informasi')
    class="drop-down active"
@endsection
@section('content')
    <section class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h4><b style="border-bottom: solid; width:">Agenda</b></h4>
        </div>
    </section>

    @php
        $bulan = [ 
            '01' => 'Januray',
            '02' => 'Februarui',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
    @endphp
    <div class="container mb-5" style="margin-top: -30px;">
        @if ($agendas->isEmpty())
            <div class="text-center">
                <p>Belum ada agenda di buat!</p>
            </div>
        @else
            @foreach ($agendas as $agenda)
                <a class="text-decoration-none" onclick="agenda({{$agenda->id}})" style="color: rgb(112, 111, 111); cursor: pointer;" data-toggle="modal" data-target="#exampleModal">
                    <div class="card shadow mb-4 border-bottom-primary" id="box">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="card bg-primary text-white text-center shadow">
                                        <div class="card-body" style="font-size: 70px;">
                                            {{date('d', strtotime($agenda->tgl_pelaksanaan))}}
                                        </div>
                                        <div class="text-50" style="background: #2848a7"> 
                                            <small> {{(strtolower($bulan[date('m', strtotime($agenda->tgl_pelaksanaan))])) 
                                            . ' ' . date('Y', strtotime($agenda->tgl_pelaksanaan))}} {{$agenda->jam}}</small>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-lg-10">
                                    <div class="mb-5 text-primary">
                                        <h2><b>{{$agenda->title}}</b></h2>
                                    </div>
                                    <p style="text-align: justify;">{{htmlspecialchars_decode(substr($agenda->deskripsi, 0, 250) . '....') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            {{$agendas->links()}}
        @endif
    </div>
@endsection

@section('modal')
    <div class="modal" tabindex="-1" id="exampleModal" style="margin-top: 35px;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="agenda-modal">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mb-2" data-dismiss="modal" style="width: 100%;">X Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{url('js/home-agenda.js')}}"></script>
@endsection