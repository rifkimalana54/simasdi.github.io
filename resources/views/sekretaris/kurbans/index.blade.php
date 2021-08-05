@extends('sekretaris.template')
@section('title', "Anggota Sohibul Qurban")
@section('sidebar-anggota')
    class="collapse show"
@endsection


@section('content')
    <div class="mb-4">
        <button class="btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#exampleModal" style="width: 100%;">
            <i class="fas fa-plus fa-sm textk-50"></i> Tambahkan Sohibul Kurban
        </button>
    </div>

    <div class="container-fluid">
        <!-- Success Message / Error Message -->
        <div id="success"></div>
        <div class="alert alert-danger" id="error" style="display:none">
            <button type="button" class="close err-close" data-dismiss="alert">x</button>
            <b>Gagal Menambahkan Sohibul Kurban!</b>
            <ul></ul>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong>
            </div>
            
        @elseif($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h5><b>Gagal Menambahkan Anggota Sohibul Kurban</b></h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary float-left">Tabel Data Anggota Sohibul Kurban</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="myTable">
                        <thead>
                            <tr class="table">
                                <th>No</th>
                                <th width="150">Nama</th>
                                <th>Alamat</th>
                                <th width="100">No. Telepon</th>
                                <th width="100">Type Hewan</th>
                                <th width="120">Harga Hewan</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    {{-- Modal Tambah Anggota Sohibul Kurban --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus fa-sm textk-50"></i> Tambahkan Sohibul Kurban
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/sohibul-kurban" id="form-sohibul-kurban" method="POST">
                        @csrf
                        <x-input title="Nama" name="nama" type="text" />
                        <x-input title="Alamat" name="alamat" type="text" />
                        <x-input title="No Telepon" name="no_telepon" type="text" />
                        
                        <div class="form-group">
                            <label for="type_hewan">Type Hewan</label>
                            <select class="form-control form-select-lg mb-3" name="type_hewan" required aria-label=".form-select-lg example" id="type_hewan">
                                <option value="">==Pilih Hewan Kurban==</option>
                                @foreach ($type_hewans as $id => $type)
                                    <option value="{{ $type->id }}"> 
                                        {{ $type->type}} 
                                    </option>
                                @endforeach   
                            </select>
                        </div>

                        <div class="float-right">
                            <button type="button" class="btn close-modal-sohibul btn-secondary mr-1" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="upload" value="Tambah Data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            var i = 1;
            var t = $('#myTable').DataTable({
                    scrollX: true,
                    serverSide: true,
                    responsive: true,
                    ajax: { "url" : "/data-kurban" },
                    order: [[4, 'asc']],
                    columns: [
                        { data: 'DT_RowIndex', name:'DT_RowIndex'},
                        { data: "nama", name: "nama"},
                        { data: "alamat", name: "alamat"},
                        { data: "no_telepon", name: "no_telepon"},
                        { data: "type", name: "type"},
                        { data: "harga", name: "harga"},
                        { data: "detail", name: "detail"}
                    ]
                });
        });
    </script>
@endpush

@section('js')
    <script src="{{url('js/kurban_sekretaris.js')}}"></script>
@endsection