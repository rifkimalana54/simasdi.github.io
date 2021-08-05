@extends('admin.template')
@section('title', "Pembayaran Sohibul Qurban")
@section('sidebar-anggota')
    class="collapse show"
@endsection

@section('content')
    <div class="mb-1">
        <h1 class="h3 mb-0 text-gray-800 mr-auto">
            Data Pembayaran Kurban 
        </h1>
    </div>
    <button class="btn btn-sm btn-primary shadow-sm mb-1" data-toggle="modal" style="width: 100%" data-target="#exampleModal">
        <i class="fas fa-edit fa-sm textk-50"></i> Edit Data
    </button>
    
    <button class="delete-sohibulkurban btn btn-sm btn-danger shadow-sm mb-2" style="width: 100%" sohibulkurban-id="{{$bayars->id}}">
        <i class="fas fa-trash fa-sm textk-50"></i> Hapus
    </button>
    {{-- {{dd($bayars)}} --}}
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h5><b>Gagal Mengubah Anggota Sohibul Kurban</b></h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    <h5><b>{{$bayars->nama . ', '}}</b>
                        {{$bayars['type_hewans']['type'] . ' Harga ' . number_format($bayars['type_hewans']['harga'])}}
                    </h5>
                </div>
            </div>
            <div class="card-body">
                @if ($bayars['bayars']->isEmpty())
                    <div class="text-center">
                        <p><b>{{$bayars->nama}}</b> belum pernah membayar!</p>
                    </div>
                @else
                <div class="table-responsive border">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr  class="table-active">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal Bayar</th>
                                <th>Bayar</th>
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
            </div>
        </div>
        @endif
    </div>

@endsection

@section('modal')
    {{-- Modal Edit Anggota Sohibul Kurban --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus fa-sm textk-50"></i> Edit Sohibul Kurban
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/halaman-sohibul-kurban/{{$bayars->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <x-input title="Nama" name="nama" type="text" :object="$bayars"/>
                        <x-input title="Alamat" name="alamat" type="text" :object="$bayars"/>
                        <x-input title="No Telepon" name="no_telepon" type="text" :object="$bayars"/>
                        
                        <div class="form-group">
                            <label>Type Hewan</label>
                            <select class="form-control form-select-lg mb-3" name="type_hewan" aria-label=".form-select-lg example" id="type_hewan" required>
                                <option value="{{$bayars->type_hewans->id}}">{{ $bayars->type_hewans->type}} </option>
                                @foreach ($type_hewans as $id => $type)
                                    <option value="{{ $type->id }}"> 
                                        {{ $type->type}} 
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="float-right">
                            <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary float-right mb-2" data-toggle="modal">Edit Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{url('js/kurban.js')}}"></script>
@endsection