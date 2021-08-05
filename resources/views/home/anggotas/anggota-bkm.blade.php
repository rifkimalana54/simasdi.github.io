@extends('layouts.app')
@section('title', 'Anggota BKM')
@section('nav-anggota')
    class="drop-down active"
@endsection
@section('content')
    <section id="team" class="team">
        <div class="d-flex align-items-center mb-2">
            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="mr-auto"><b style="border-bottom: solid; width:">Anggota BKM</b></h4>
                    </div>
                    <div class="col-md d-flex">
                        <input type="text" name="search" id="search" placeholder="Cari..." class="form-control" style="width: 250px;" autocomplete="off" />
                        <i class="icofont-search" style="margin: 12px 0 0 -27px;" for="search"></i>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row" id="data">
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{url('js/home-bkm.js')}}"></script>
@endsection