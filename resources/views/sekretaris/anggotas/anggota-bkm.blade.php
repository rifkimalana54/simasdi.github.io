@extends('sekretaris.template')
@section('title', "Anggota BKM")
@section('sidebar-anggota')
    class="collapse show"
@endsection


@section('content')
    <div class="mb-4">
        <button class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modatInput" style="width: 100%;">
            <i class="fas fa-plus fa-sm textk-50"></i> Tambah Anggota
        </button>
    </div>

    <div class="container-fluid"></div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close btn-closeupdate" data-dismiss="alert">x</button>
            <strong>{{$message}}</strong>
        </div>
        
    @elseif($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <b>Gagal Menambahkan Anggota BKM</b>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="success"></div>
    <div class="alert alert-danger" id="error" style="display:none">
        <button type="button" class="close err-close" data-dismiss="alert">x</button>
        <h5>Gagal Membuat Agenda!</h5>
        <ul></ul>
    </div>

    <div class="alert alert-danger errorMsg" style="display:none">
        <button type="button" class="close err-close" data-dismiss="alert">x</button>
        <h5>Gagal Menambahkan Anggota BKM!</h5>
        <ul></ul>
    </div>
    <div id="data"></div>
@endsection

@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="modatInput">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus fa-sm textk-50"></i> Tambah Anggota
                    </h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/anggota-store" id="upload_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <div class="my-2">
                                        <img id="previewImg" src="" style="width: 100px;" class="img-fluid"/>
                                    </div>
                                    <input type="file" onchange="preview()" id="select_file" name="foto" class="form-control-input">
                                </div>
                                <x-input title="Nama" name="nama" type="text" />
                                <x-input title="Alamat" name="alamat" type="text" />
                            </div>
                            <div class="col-lg">
                                <x-input title="Jabatan" name="jabatan" type="text" />
                                <div class="form-group">
                                    <label>WhatsApp</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control mr-1" readonly value="+62" style="width: 60px;">
                                        <input type="text" name="whatsapp" class="form-control">
                                    </div>
                                </div>
                                <x-input title="Facebook" name="facebook" type="text" />
                                <x-input title="Instagram" name="instagram" type="text" />
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="button" class="btn btn-secondary btn-close mr-1" data-dismiss="modal">Tutup</button>
                            <input type="submit" class="btn btn-primary" name="upload" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalDetail">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-info-circle fa-sm textk-50"></i> Detail Anggota
                    </h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="data-detail"></div>
                    <button type="button" class="btn btn-secondary mb-2" data-dismiss="modal" style="width: 100%;">X Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit fa-sm textk-50"></i> Edit Anggota
                    </h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="data-edit">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{url('js/anggota_bkm.js')}}"></script>
@endsection
