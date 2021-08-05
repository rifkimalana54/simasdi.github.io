@extends('sekretaris.template')
@section('title', "Pembayaran Sohibul Qurban")
@section('sidebar-anggota')
    class="collapse show"
@endsection


@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800 mr-auto">
            Data Pembayaran Kurban 
        </h1>

        <button class="btn btn-sm btn-primary shadow-sm mb-1" data-toggle="modal" data-target="#exampleModal" style="width: 100%;">
            <i class="fas fa-edit fa-sm textk-50"></i> Edit Data
        </button>
        
        <button class="delete-sohibulkurban btn btn-sm btn-danger shadow-sm" sohibulkurban-id="{{$bayars->id}}" style="width: 100%;">
            <i class="fas fa-trash fa-sm textk-50"></i> Hapus
        </button>
    </div>

    <div class="container-fluid">
        <div id="success"></div>
        <div class="alert alert-danger" id="error" style="display:none">
            <button type="button" class="close err-close" data-dismiss="alert">x</button>
            <h5>Gagal Membayar!</h5>
            <ul></ul>
        </div>

        <div id="data-bayar">

        </div>
    </div>
@endsection

@section('modal')
    {{-- Modal Edit Anggota Sohibul Kurban --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit fa-sm textk-50"></i> Edit Sohibul Kurban
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/sohibul-kurban/{{$bayars->id}}" method="POST">
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

    {{-- Modal Bayar Anggota Sohibul Kurban --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalBayar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus fa-sm textk-50"></i> Bayar
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="data-form" action="/bayar-kurban/{{$bayars->id}}" method="POST">
                        @csrf
                        <table>
                            <tr>
                                <td>Nama </td>
                                <td>: <b  class="mb-2">{{$bayars->nama}}</b></td>
                            </tr>
                            <tr>
                                <td>Alamat </td>
                                <td>: <b  class="mb-2">{{$bayars->alamat}}</b></td>
                            </tr>
                            <tr>
                                <td width="110">Jumlah Bayar </td>
                                <input type="hidden" name="id" id="id-bayar" value="{{$bayars->id}}">
                                <input type="hidden" name="nama" id="nama-s" value="{{$bayars->nama}}">
                                <td><input type="text" name="bayar" class="form-control" style="width: 250px;"></td>
                            </tr>
                        </table>
                        <div class="float-right mt-2">
                            <button type="button" id="btn-close" class="btn btn-secondary mr-1" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary float-right mb-2" value="Bayar" data-toggle="modal">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit Bayar Kurban--}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditBayar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit fa-sm textk-50"></i> Edit Bayar
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="modal-edit">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{url('js/kurban_detail_sekretaris.js')}}"></script>
@endsection