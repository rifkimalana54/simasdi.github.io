@extends('layouts.app')
@section('title', 'Laporan')
@section('nav-invormasi')
    class="active"
@endsection

@section('content')
    <section class="d-flex align-items-center">
        <div class="container d-flex" data-aos="zoom-out" data-aos-delay="100">
            <h4 class="mr-auto"><b style="border-bottom: solid; width:">Laporan</b></h4>
        </div>
    </section>
    
    <div class="container" style="margin-top: -50px; margin-bottom: 100px;">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan pemasukan dan pengeluaran</h6>
            </div>
            <div class="card-body">
                @if ($laporans->isEmpty())
                    <div class="text-center text-danger">
                        <p>Belum ada laporan dibuat!</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="myTable">
                            <thead>
                                <tr class="table-active">
                                    <th>No</th>
                                    <th>Deskripsi</th>
                                    <th width="150">Dari</th>
                                    <th>Kebutuhan</th>
                                    <th>Pemasukan</th>
                                    <th>Pengeluaran</th>
                                    <th width="240">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                    $total_pengeluaran = 0;
                                @endphp

                                @foreach ($laporans as $laporan)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$laporan->deskripsi}}</td>
                                        <td>{{$laporan->dari}}</td>
                                        <td>{{$laporan->kebutuhan}}</td>
                                        <td>{{($laporan->pemasukan == null ? ' ' : ' Rp.' .number_format($laporan->pemasukan) )}}</td>
                                        <td>{{($laporan->pengeluaran == null ? ' ' : ' Rp.' .number_format($laporan->pengeluaran) )}}</td>
                                        <td>{{$laporan->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                <tr class="table-active">
                                    <td colspan="6" class="border-right"><b class="float-right">Total Dana Pemasukan</b></td>
                                    <td>
                                        <b>Rp.{{number_format($seluruh_pemasukan)}}</b>
                                    </td>
                                </tr>
                                <tr class="table-active">
                                    <td colspan="6" class="border-right"><b class="float-right">Total Dana Pengeluaran</b></td>
                                    <td>
                                        <b>Rp.{{number_format($seluruh_pengeluaran)}}</b>
                                    </td>
                                </tr>
                                <tr class="table-danger">
                                    <td colspan="6" class="border-right"><b class="float-right">Total Dana Saat Ini</b></td>
                                    <td>
                                        <b>Rp.{{number_format($seluruh_pemasukan - $seluruh_pengeluaran)}}</b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @endif
                {{$laporans->links()}}
            </div>
        </div>
    </div>
@endsection