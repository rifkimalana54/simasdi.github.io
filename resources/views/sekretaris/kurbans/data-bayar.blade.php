<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">
            {{$bayars->nama . ', '}} {{$bayars['type_hewans']['type'] . ' Harga ' . number_format($bayars['type_hewans']['harga'])}}
        </h6>
        
        <button onclick="bayar()" class="float-right btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm textk-50"> Bayar</i>
        </button>
    </div>
    <div class="card-body">
        @if ($bayars['bayars']->isEmpty())
            <div class="text-center">
                <p><b>{{$bayars->nama}}</b> belum pernah membayar!</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Bayar</th>
                        <th scope="col">Bayar</th>
                        <th scope="col" width="100" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                        $grandtotal = 0;
                    @endphp
                        @foreach ($bayars['bayars'] as $bayar)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$bayar->sohibulkurban->nama}}</td>
                            <td>{{$bayar->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                            <td>Rp. {{number_format($bayar->bayar)}}</td>
                            <td>
                                
                                <a onclick="editBayar({{$bayar->id}})" class="btn btn-sm btn-primary ml-1 shadow-sm">
                                    <i class="fas fa-edit fa-sm textk-50"></i>
                                </a>
                                <button onclick="hapusBayar({{$bayar->id}})" class="btn btn-sm btn-danger ml-1 shadow-sm">
                                    <i class="fas fa-trash fa-sm textk-50"></i>
                                </button>
                            </td>
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
                                @if ($grandtotal >= $bayars['type_hewans']['harga'])
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