@extends('layouts.app')
@section('title', "Isi Surah Qur'an")
@section('nav-quran')
    class="active"
@endsection

@section('content')
    <section class="d-flex align-items-center">
        <div class="container d-flex" data-aos="zoom-out" data-aos-delay="100">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="text-center mb-3">
                    <h4>Surah {{$nama_surah}}</h4>
                    <small>{{$count_ayat}} Ayat</small>
                </div>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <div class="text-right">
                                            <b style="font-size: 25px;">{{$item['ar']}}</b><br>
                                            <b>{!!$item['tr']!!}</b><br>
                                        </div>
                                        <div style="text-align: justify;">
                                            Artinya:<br> 
                                            "{{$item['id']}}"
                                        </div>
                                    </td>
                                    <td width="40">.{{$i++}}</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            
        </div>
    </section>
@endsection