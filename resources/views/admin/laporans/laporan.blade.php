@extends('admin.template')
@section('title', "Laporan")
@section('content')
    <div class="row mb-4">
        <div class="col-md">
            <button id="btn-pemasukan" class="btn btn-sm btn-primary shadow-sm mr-2 mb-2" style="width: 100%;">
                <i class="fas fa-plus fa-sm textk-50"></i> Buat Laporan Pemasukan
            </button>
        </div>
        <div class="col-md">
            <button id="btn-pengeluaran" class="btn btn-sm btn-warning shadow-sm " style="width: 100%;">
                <i class="fas fa-plus fa-sm textk-50"></i> Buat Laporan Pengeluaran
            </button>
        </div>
    </div>

    <div class="container-fluid">
        <div id="success"></div>
        <div class="alert alert-danger" id="error" style="display:none">
            <button type="button" class="close err-close" data-dismiss="alert">x</button>
            <b>Gagal Membuat Laporan Pemasukan!</b>
            <ul></ul>
        </div>
        <div id="table_laporan">

        </div>
    </div>
@endsection
@section('modal')
    {{-- Modal Tambah laporan pemasukan --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalInput">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus fa-sm textk-50"></i> Buat Laporan Pemasukan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/laporan-pemasukan/store" id="form-pemasukan" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="dari-pemasukan">Dari</label>
                            <input type="text" name="dari" id="dari-pemasukan" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="keterangan-pemasukan">Deskripsi</label>
                            <textarea type="text" name="deskripsi" id="keterangan-pemasukan" class="form-control" style="height: 80px;"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="jumlah-pemasukan">Jumlah Pemasukan/Sumbangan</label>
                            <input type="text" name="pemasukan" id="jumlah-pemasukan" class="form-control" autocomplete="off">
                        </div>

                        <div class="float-right">
                            <button type="button" class="btn btn-secondary close-pemasukan mr-1" data-dismiss="modal">Tutup</button>
                            <input type="submit" name="upload" class="btn btn-primary mr-1" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah laporan pengeluaran --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalInputPengeluaran">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus fa-sm textk-50"></i> Buat Laporan Pengeluaran
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/laporan-pengeluaran/store" id="form-pengeluaran" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="kebutuhan-pengeluaran">Kebutuhan</label>
                            <input type="text" name="kebutuhan" id="kebutuhan-pengeluaran" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="deskripsi-pengeluaran">Deskripsi</label>
                            <textarea type="text" name="deskripsi" id="deskripsi-pengeluaran" class="form-control" style="height: 80px;"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="jumlah-pengeluaran">Jumlah pengeluaran/Sumbangan</label>
                            <input type="text" name="pengeluaran" id="jumlah-pengeluaran" class="form-control" autocomplete="off">
                        </div>

                        <div class="float-right">
                            <button type="button" class="btn btn-secondary close-pengeluaran mr-1" data-dismiss="modal">Tutup</button>
                            <input type="submit" name="upload" class="btn btn-primary mr-1" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit laporan pemasukan --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditPemasukan">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit fa-sm textk-50"></i> Edit Laporan Pemasukan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="data-edit-pemasukan">
                    
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit laporan pengeluaran --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditPengeluaran">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit fa-sm textk-50"></i> Edit Laporan Pengeluaran
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="data-edit-pengeluaran">
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{url('js/laporan.js')}}"></script>
@endsection