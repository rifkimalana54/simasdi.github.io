<form action="/laporan-pengeluaran/{{$laporan->id}}/update" id="form-edit-pengeluaran" method="post">
    @csrf

    <div class="form-group">
        <label for="kebutuhan-pengeluaran">Kebutuhan</label>
        <input type="text" name="kebutuhan" id="kebutuhan-pengeluaran" value="{{$laporan->kebutuhan}}" class="form-control" autocomplete="off">
    </div>

    <div class="form-group">
        <label for="deskripsi-pengeluaran">Deskripsi</label>
        <textarea type="text" name="deskripsi" id="deskripsi-pengeluaran" class="form-control" style="height: 80px;">{{$laporan->deskripsi}}</textarea>
    </div>

    <div class="form-group">
        <label for="jumlah-pengeluaran">Jumlah pengeluaran/Sumbangan</label>
        <input type="text" name="pengeluaran" id="jumlah-pengeluaran" value="{{$laporan->pengeluaran}}" class="form-control" autocomplete="off">
        <input type="hidden" name="id" id="id-pengeluaran" value="{{$laporan->id}}">
    </div>
    
    <div class="float-right">
        <button type="button" class="btn btn-secondary close-pengeluaran mr-1" data-dismiss="modal">Tutup</button>
        <input type="submit" name="upload" class="btn btn-primary mr-1" value="Update">
    </div>
</form>

<script src="{{url('js/laporan.js')}}"></script>