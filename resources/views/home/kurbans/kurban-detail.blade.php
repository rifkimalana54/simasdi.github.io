@extends('layouts.app')
@section('title', 'Pembayaran Sohibul Kurban')
@section('nav-anggota')
    class="drop-down active"
@endsection

@section('content')
    <section class="align-items-center">
        <div class="container d-flex" data-aos="zoom-out" data-aos-delay="100">
            <h3 class="mr-auto"><b style="border-bottom: solid; width:">Data Pembayaran <span class="text-primary">{{$bayars->nama}}</span></b></h3>
        </div>
        <div class="container mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Tabel pembayaran {{$bayars->nama}} | {{$bayars->type_hewans->type}} | Harga {{number_format($bayars->type_hewans->harga)}}
                    </h6>
                </div>
                <div class="card-body">
                    @if ($bayars['bayars']->isEmpty())
                        <div class="text-center text-danger">
                            <p><b>{{$bayars->nama}}</b> belum pernah membayar!</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr  class="table-active">
                                        <th width="50">No</th>
                                        <th>Nama</th>
                                        <th>Tanggal Bayar</th>
                                        <th width="200">Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                        $grandtotal = 0;
                                    @endphp
                                        @foreach ($bayars['bayars'] as $bayar)
                                        <tr>
                                            <td>@php echo $i; @endphp</td>
                                            <td>{{$bayar->sohibulkurban->nama}}</td>
                                            <td>{{$bayar->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                                            <td>Rp. {{number_format($bayar->bayar)}}</td>
                                        </tr>
                                        @php
                                            $i++;
                                            $grandtotal += $bayar->bayar
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="table-active">
                                        <td colspan="3" class="border-right"><b class="float-right">Total Bayar</b></td>
                                        <td colspan="3">
                                            <b>Rp.{{number_format($grandtotal)}}</b>
                                                @if ($grandtotal == $bayars['type_hewans']['harga'])
                                                    <button class="btn btn-sm btn-success shadow-sm float-right">
                                                        Lunas
                                                    </button>
                                                @else
                                                    <button class="btn btn-sm btn-danger shadow-sm float-right">
                                                        Belum Lunas
                                                    </button>
                                                @endif
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection