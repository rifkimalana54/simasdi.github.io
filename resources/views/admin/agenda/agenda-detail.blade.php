@extends('admin.template')
@section('title', "Agenda")
@section('sidebar-halaman')
    class="collapse show"
@endsection
@section('content')
    <div class="d-flex mb-2">
        <h1 class="h3 mb-0 text-gray-800 mr-auto">Detail Agenda</h1>
        <a target="_blank" href="/agenda-cetak/{{$agenda->id}}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-print fa-sm textk-50"></i> Print
        </a>
    </div>
    <button class="btn btn-sm btn-primary shadow-sm mb-1"  data-toggle="modal" data-target="#editAgenda" style="width: 100%;">
        <i class="fas fa-edit fa-sm textk-50"></i> Edit
    </button>

    <button class="delete-agenda btn btn-sm btn-danger mb-4 shadow-sm" agenda-id="{{$agenda->id}}" style="width: 100%;">
        <i class="fas fa-trash fa-sm textk-50"></i> Hapus
    </button>

    <div class="container-fluid">
        <div id="print-success-msg">
        </div>
        <div class="alert alert-danger print-error-msg" style="display:none">
            <button type="button" class="close err-close" data-dismiss="alert">x</button>
            <h5>Gagal Edit Agenda!</h5>
            <ul></ul>
        </div>
        <div id="read-detail">

        </div>
    </div>
@endsection

@section('js')
    {{-- Modal Edit Agenda --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="editAgenda">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit fa-sm textk-50"></i> Edit Agenda
                    </h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" class="form-control" value="{{$agenda->id}}">
                        <x-input title="Judul Agenda" type="text" name="title" :object="$agenda"/>

                        <x-textarea title="Deskripsi" type="text" name="deskripsi" :object="$agenda"/>

                        <div class="form-group">
                            <label>Tanggal Pelaksanaan</label>
                            <input type="date" name="tgl_pelaksanaan" class="form-control" value="{{$agenda->tgl_pelaksanaan->isoFormat('Y-MM-D')}}" style="width: 200px;">
                        </div>
                        
                        <div class="form-group">
                            <label>Jam</label>
                            <input type="time" name="jam" class="form-control" value="{{$agenda->jam}}" style="width: 200px">
                            
                        </div>
                        
                        <x-input title="Tempat" type="text" name="tempat" :object="$agenda"/>
                        
                        <div>
                            <button class="btn btn-primary btn-submit mr-1" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('js/edit-agenda.js')}}"></script>
@endsection