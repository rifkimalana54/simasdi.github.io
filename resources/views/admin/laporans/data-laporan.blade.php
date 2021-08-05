<!-- Table Pemasukkan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pemasukkan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive mb-2">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr  class="table-active">
                        <th>No</th>
                        <th>Dari</th>
                        <th>Deskripsi</th>
                        <th width="170">Tanggal</th>
                        <th width="150">Pemasukkan</th>
                        <th width="95" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                        $totalpemasukan = 0;
                    @endphp
                    @if ($pemasukans->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada pemasukan!</td>
                        </tr>
                    @else
                        @foreach ($pemasukans as $pemasukan)
                            <tr>
                                <td>@php echo $i; @endphp</td>
                                <td>{{$pemasukan->dari}}</td>
                                <td>{{$pemasukan->deskripsi}}</td>
                                <td>{{$pemasukan->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                                <td>Rp.{{number_format($pemasukan->pemasukan)}}</td>
                                <td>
                                    <button onclick="editPemasukan({{$pemasukan->id}})" class="btn btn-sm btn-primary shadow-sm">
                                        <i class="fas fa-edit fa-sm textk-50"></i>
                                    </button>
                                    <button onclick="hapusPemasukan({{$pemasukan->id}})" class="btn btn-sm btn-danger ml-1 shadow-sm">
                                        <i class="fas fa-trash fa-sm textk-50"></i>
                                    </button>
                                </td>
                            </tr>
                            @php
                                $i++;
                                $totalpemasukan += $pemasukan->pemasukan
                            @endphp
                        @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-active">
                        <td colspan="4" class="border-right"><b class="float-right">Total</b></td>
                        <td colspan="2">
                            <b>Rp.{{number_format($totalpemasukan)}}</b>
                        </td>
                    </tr>
                    <tr class="table-danger">
                        <td colspan="4" class="border-right"><b class="float-right">Total Seluruh Pemasukkan</b></td>
                        <td colspan="2">
                            <b>Rp.{{number_format($seluruh_pemasukan)}}</b>
                        </td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>

<!-- Table Pengeluaran -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pengeluaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive mb-2">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr  class="table-active">
                        <th>No</th>
                        <th>Kebutuhan</th>
                        <th>Deskripsi</th>
                        <th width="170">Tanggal</th>
                        <th width="150">Pengeluaran</th>
                        <th width="95" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                        $total_pengeluaran = 0;
                    @endphp
                    @if ($pengeluarans->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada pengeluaran!</td>
                        </tr>
                    @else
                        @foreach ($pengeluarans as $pengeluaran)
                            <tr>
                                <td>@php echo $i; @endphp</td>
                                <td>{{$pengeluaran->kebutuhan}}</td>
                                <td>{{$pengeluaran->deskripsi}}</td>
                                <td>{{$pengeluaran->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                                <td>Rp.{{number_format($pengeluaran->pengeluaran)}}</td>
                                <td>
                                    <button onclick="editPengeluaran({{$pengeluaran->id}})" class="btn btn-sm btn-primary shadow-sm">
                                        <i class="fas fa-edit fa-sm textk-50"></i>
                                    </button>
                                    <button onclick="hapusPengeluaran({{$pengeluaran->id}})" class="btn btn-sm btn-danger ml-1 shadow-sm" pengeluaran-id="{{$pengeluaran->id}}">
                                        <i class="fas fa-trash fa-sm textk-50"></i>
                                    </button>
                                </td>
                            </tr>
                            @php
                                $i++;
                                $total_pengeluaran += $pengeluaran->pengeluaran
                            @endphp
                        @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-active">
                        <td colspan="4" class="border-right"><b class="float-right">Total</b></td>
                        <td colspan="2">
                            <b>Rp.{{number_format($total_pengeluaran)}}</b>
                        </td>
                    </tr>
                    <tr class="table-danger">
                        <td colspan="4" class="border-right"><b class="float-right">Total Seluruh Pengeluaran</b></td>
                        <td colspan="2">
                            <b>Rp.{{number_format($seluruh_pengeluaran)}}</b>
                        </td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Keterangan Jumlah Dana</h6>
    </div>
    <div class="card-body">
        <h5>Total Seluruh Pemasukan &nbsp; = <b>Rp.{{number_format($seluruh_pemasukan)}}</b><br>
            Total Seluruh Pengeluaran = <b>Rp.{{number_format($seluruh_pengeluaran)}}</b> _ </h5>
        <h4 class="text-danger">Total Dana Saat Ini  <b class="ml-5">Rp.{{number_format($seluruh_pemasukan - $seluruh_pengeluaran)}}</b></h4>
    </div>
</div>