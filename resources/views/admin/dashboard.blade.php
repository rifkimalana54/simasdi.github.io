@extends('admin.template')
@section('title', "Dahsboard Admin")

@section('content')
    <div onload="window.print()" class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Dana Terkumpul</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @php
                                        use App\Models\Laporan;
                                        $seluruh_pemasukan = Laporan::sum('pemasukan');
                                        $seluruh_pengeluaran = Laporan::sum('pengeluaran');
                                    @endphp
                                    Rp. {{number_format($seluruh_pemasukan - $seluruh_pengeluaran)}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Dana Kurban</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Rp. {{number_format($bayars)}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Sohibul Kurban
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            @php
                                                use App\Models\SohibulKurban;            
                                            @endphp
                                            {{$skurbans = SohibulKurban::count()}} Orang
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Anggota BKM
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @php
                                        use App\Models\AnggotaBkm;
                                        $count = AnggotaBkm::count();
                                    @endphp
                                    {{$count}} Orang
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="container">
                    <h3><b>Selamat Datang Di Panel Admin</b></h3>
                    <p>Kamu masuk sebagai Admin, disin kamu bisa membuat agenda, laporan,  menambahkan anggota, setting aplikasi dan lain-lain.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
