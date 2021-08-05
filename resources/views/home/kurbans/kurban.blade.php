@extends('layouts.app')
@section('title', 'Anggota Sohibul Kurban')
@section('nav-anggota')
    class="drop-down active"
@endsection

@section('content')
    <section class="align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="col-md-9">
                    <h4 class="mr-auto"><b style="border-bottom: solid; width:">Daftar Nama Sohibul Kurban</b></h4>
                </div>
                <div class="col-md d-flex">
                    <input type="text" name="search" id="search" placeholder="Cari..." class="form-control" style="width: 250px;" autocomplete="off" />
                    <i class="icofont-search" style="margin: 12px 0 0 -27px;" for="search"></i>
                </div>
            </div>
        </div>
    </section>
    
    <div class="container" style="margin-top: -50px; margin-bottom: 100px;">
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Data Sohibul Kurban</h6>
            </div>
            <div class="card-body">
                @if ($skurbans->isEmpty())
                    <div class="text-center text-danger">
                        <p>Tidak ada sohibul sohibul kurban!</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="myTable">
                            <thead>
                                <tr class="table-active">
                                    <th>No</th>
                                    <th width="250">Nama</th>
                                    <th width="400">Alamat</th>
                                    <th width="140">Type Hewan</th>
                                    <th width="150">Harga Hewan</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{url('js/home-kurban.js')}}"></script>
@endsection