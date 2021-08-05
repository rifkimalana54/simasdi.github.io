@extends('layouts.app')
@section('title', "Qur'an Digital")
@section('nav-quran')
    class="active"
@endsection

@section('content')
    <section class="align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="text-center">
                        <b>Qur'an Digital</b><br><br>
                        <h4>Daftar Surah Al-Qur'an</h4>
                        <small>114 Surah</small>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr >
                                        <td>{{$i++}}</td>
                                        <td class="text-right">
                                            <b>{{$item['nama']}} - <span style="font-size: 20px;">{{$item['asma']}}</span></b><br>
                                            <small>{{$item['ayat']}} Ayat</small>
                                        </td>
                                        <td width="50" class="text-center"><a href="/baca-quran/{{$item['nomor']}}/{{$item['nama']}}/{{$item['ayat']}}" style="font-size:25px">&raquo;</a></td>
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