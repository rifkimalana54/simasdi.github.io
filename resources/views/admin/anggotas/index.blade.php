@extends('admin.template')
@section('title', "Anggota BKM")
@section('sidebar-anggota')
    class="collapse show"
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary float-left">Tabel Data Anggota BKM</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr  class="table-active">
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jabatan</th>
                                <th>WhatsApp</th>
                                <th>Facebook</th>
                                <th>Instagram</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
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
@endsection
@push('scripts')
    <script>
        $(document).ready( function () {
            var i = 1;
            var t = $('#dataTable').DataTable({
                    scrollX: true,
                    serverSide: true,
                    responsive: true,
                    ajax: { "url" : "/get-anggota-bkm" },
                    columns: [
                        { data: 'DT_RowIndex', name:'DT_RowIndex'},
                        { data: "foto", name: "foto"},
                        { data: "nama", name: "nama"},
                        { data: "alamat", name: "alamat"},
                        { data: "jabatan", name: "jabatan"},
                        { data: "whatsapp", name: "whatsapp"},
                        { data: "facebook", name: "facebook"},
                        { data: "instagram", name: "instagram"},
                        { data: "aksi", name: "aksi"},
                    ]
                });
        });
    </script>
@endpush
@section('js')
    <script>
        //Show Detail anggota BKM
        function detail(id) {
            fetch('/admin-anggota-bkm/'+id)
            .then(response => response.json())
            .then(data => {
                let newAnggota = renderAnggota(data.data);
                $('#data-detail').html(newAnggota);
            });
        }

        function renderAnggota(data) {
            return `
            <div class="row mb-2">
                <div class="col-6">
                    <img src="/image/profile/${data.foto}" alt="" style="height:180px; width:100%; border-radius: 10px;">
                </div>
                <div class="col-6">
                    <table class="ml-1">
                        <tr>
                            <th><h5>${data.nama}</h5></th>
                        </tr>
                        <tr>
                            <th>${data.alamat}</th>
                        </tr>
                    </table>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Jabatan </th>
                    <th>${data.jabatan}</th>
                </tr>
                <tr>
                    <th>WhatsApp </th>
                    <th><a target="_blank" href="https://wa.me/62${data.whatsapp}">+62${data.whatsapp}</a></th>
                </tr>
                <tr>
                    <th>Facebook </th>
                    <th>${data.facebook}</th>
                </tr>
                <tr>
                    <th>Instagram </th>
                    <th>${data.instagram}</th>
                </tr>
            </table>
            `;
        }

    </script>
@endsection
