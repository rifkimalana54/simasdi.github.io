<form id="btn-submit-update" action="/edit-bayar/{{$bayar->id}}" method="POST">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td>Nama </td>
            <td>: <b  class="mb-2">{{$bayar->sohibulkurban->nama}}</b></td>
        </tr>
        <tr>
            <td>Alamat </td>
            <td>: <b  class="mb-2">{{$bayar->sohibulkurban->alamat}}</b></td>
        </tr>
        <tr>
            <td width="110">Jumlah Bayar </td>
            <td><input type="text" id="bayaredit" name="bayar" class="form-control" value="{{$bayar->bayar}}" style="width: 250px;"></td>
            <input type="hidden" id="id-bayaredit" class="form-control" value="{{$bayar->id}}">
            
        </tr>
    </table>
    
    <div class="float-right mt-2">
        <button type="button" class="btn btn-secondary mr-1" id="close-editBayar" data-dismiss="modal">Batal</button>
        <input type="submit" class="btn btn-primary float-right mb-2" data-toggle="modal" value="Update">
    </div>
</form>
<script>
    $('#btn-submit-update').on("submit", function(e) {
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var bayar = $("#bayaredit").val()
            var id = $("#id-bayaredit").val()
            $.ajax({
                url: "/edit-bayar/"+id,
                type: "PUT",
                data: {_token:_token, bayar:bayar},
                success: function(data) {
                    if($.isEmptyObject(data.error)) {
                        read()
                        $('#close-editBayar').click();
                        $('.err-close').click();
                        $('#success').html('<div class="alert alert-success"><button type="button" class="close" id="success-close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                        swal({
                            title: "Edit bayar berhasil!",
                            text: "Klik Ok untuk melanjutkan!",
                            icon: "success",
                            button: "OK",
                        });
                    } else {
                        read()
                        $('#close-editBayar').click();
                        swal({
                            title: "Edit bayar gagal!",
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
        });
</script>