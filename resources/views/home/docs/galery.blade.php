@extends('layouts.app')
@section('title', 'Galery')
@section('nav-galery')
    class="active"
@endsection

@section('content')
    <section class="align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="col-md-9">
                    <h4 class="mr-auto"><b style="border-bottom: solid; width:">Documentasi Foto</b></h4>
                </div>
            </div>
        </div>
        <div class="container">
            @if ($galerys->isEmpty())
                <div class="text-center">Tidak ada data di galery!</div>
            @endif
            <div class="row" id="galery-wrapper">
                @foreach ($galerys as $galery)
                <div class="col-lg-4">
                    <img src="{{url('image/galery/'.$galery->gambar)}}" class="img-fluid" alt="">
                    <input type="hidden" class="galery_time" value="{{strtotime($galery->created_at)}}">
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
@endsection
@section('js')
    <script src="js/home-galery.js"></script>
@endsection
