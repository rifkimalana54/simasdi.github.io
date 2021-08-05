<form action="/anggota-bkm/{{$anggota->id}}/update" id="form-edit-bkm" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg">
            <div class="form-group">
                <label>Foto
                <div class="my-2">
                    <img id="previewImg" src="{{url('image/profile/'.$anggota->foto)}}" style="width: 100px; height: 100px;"/>
                </div>
                <input type="file" id="foto" onchange="preview()" id="edit-foto-bkm" name="foto" class="form-control-input">
            </div>
            <x-input title="Nama" id="nama" name="nama" type="text" :object="$anggota"/>
            <x-input title="Alamat" id="alamat" name="alamat" type="text" :object="$anggota"/>
        </div>
        <div class="col-lg">
            <x-input title="Jabatan" id="jabatan" name="jabatan" type="text" :object="$anggota"/>
            <div class="form-group">
                <label>WhatsApp</label>
                <div class="d-flex">
                    <input type="text" class="form-control mr-1" readonly value="+62" style="width: 60px;">
                    <input type="text" id="whatsapp" name="whatsapp" class="form-control" value="{{$anggota->whatsapp}}">
                </div>
            </div>
            <x-input title="Facebook" id="facebook" name="facebook" type="text" :object="$anggota"/>
            <x-input title="Instagram" id="instagram" name="instagram" type="text" :object="$anggota"/>
            <input type="hidden" name="id_bkm" id="id-bkm" value="{{$anggota->id}}">
        </div>
    </div>
    <div class="float-right">
        <button type="button" class="btn btn-secondary btn-close mr-1" data-dismiss="modal">Tutup</button>
        <input type="submit" name="upload" class="btn btn-primary mr-1" value="Update">
    </div>
</form>
<script>
    $(document).ready(function() {
        read()
        var id_bkm = $('#id-bkm').val();
        $('#form-edit-bkm').on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "/anggota-bkm/"+id_bkm+"/update",
                method: "POST",
                data:new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                success:function(data) {
                    if($.isEmptyObject(data.error)){
                        $('.btn-close').click();
                        $('#success').html('<div class="alert alert-success"><button type="button" class="close" id="success-close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                        swal({
                            title: "Berhasil Update Anggota BKM!",
                            text: "Klik Ok untuk melanjutkan!",
                            icon: "success",
                            button: "OK",
                        });
                        read();
                    } else {
                        $('.btn-close').click();
                        swal({
                            title: "Gagal Update Anggota BKM!",
                            text: "Klik Ok, baca keterangan diatas!",
                            icon: "error",
                            button: "OK",
                        });
                        errorMessage(data.error);
                    }
                }
            });
            function errorMessage(msg) {
                $("#error").find("ul").html('');
                $("#error").css('display','block');
                $.each( msg, function( key, value ) {
                    $("#error").find("ul").append('<li>'+value+'</li>');
                });
            }
        })
    });
</script>