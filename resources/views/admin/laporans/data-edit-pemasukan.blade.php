<form action="/laporan-pemasukan/{{$laporan->id}}" id="form-edit-pemasukan" method="post">
    @csrf

    <div class="form-group">
        <label for="dari-pemasukan">Dari</label>
        <input type="text" name="dari" id="dari-pemasukan" class="form-control" value="{{$laporan->dari}}" autocomplete="off">
    </div>

    <div class="form-group">
        <label for="keterangan-pemasukan">Jumlah Pemasukan/Sumbangan</label>
        <textarea type="text" name="deskripsi" id="keterangan-pemasukan" class="form-control" style="height: 80px;">{{$laporan->deskripsi}}</textarea>
    </div>

    <div class="form-group">
        <label for="jumlah-pemasukan">Jumlah Pemasukan/Sumbangan</label>
        <input type="text" name="pemasukan" id="jumlah-pemasukan" class="form-control" value="{{$laporan->pemasukan}}" autocomplete="off">
    </div>

    <div class="float-right">
        <button type="button" class="btn btn-secondary close-pemasukan mr-1" data-dismiss="modal">Tutup</button>
        <input type="submit" name="upload" class="btn btn-primary mr-1" value="Update">
    </div>
    <input type="hidden" name="id" value="{{$laporan->id}}" id="id-pemasukan">
</form>

<script src="{{url('js/laporan.js')}}"></script>
