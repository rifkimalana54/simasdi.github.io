@extends('admin.template')
@section('title', "Agenda")
@section('sidebar-halaman')
    class="collapse show"
@endsection
@section('content')
    <div class="d-flex mb-4">
        <h1 class="h3 mb-0 text-gray-800 mr-auto">Agenda</h1>
    </div>

    <div class="container-fluid">
        <div id="print-success-msg">
        </div>

        <div class="alert alert-danger print-error-msg" style="display:none">
            <button type="button" class="close err-close" data-dismiss="alert">x</button>
            <h5>Gagal Membuat Agenda!</h5>
            <ul></ul>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div id="data"> </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Buat Agenda</h6>
                    </div>
                    <div class="card-body">
                        <form action="">
                            {{ csrf_field() }}

                            <x-input title="Judul Agenda" type="text" name="title" />

                            <x-textarea title="Deskripsi" type="text" name="deskripsi" />

                            <div class="form-group">
                                <label>Tanggal Pelaksanaan</label>
                                <input type="date" name="tgl_pelaksanaan" class="form-control" style="width: 200px;">
                            </div>
                            
                            <div class="form-group">
                                <label>Jam</label>
                                <input type="time" name="jam" class="form-control" style="width: 200px">
                                
                            </div>
                            
                            <x-input title="Tempat" type="text" name="tempat" />
                            
                            <div>
                                <button class="btn btn-primary btn-submit mr-1" type="submit">Buat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{url('js/agenda.js')}}"></script>
    
@endsection