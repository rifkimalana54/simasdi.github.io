
//Hapus anggota sohibul kurban
$('.delete-sohibulkurban').click(function () {
    
    var sohibulkurban_id = $(this).attr('sohibulkurban-id');
    swal({
        title: "Yakin ingin hapus sohibul kurban?",
        text: "Jika data dihapus tidak bisa dikembalikan lagi!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/sohibul-kurban/" + sohibulkurban_id + '/delete';
        }
    });
});

function bayar() {
    $('#modalBayar').modal('show');
}
$(document).ready(function() {
    read()
    var id = $('#id-bayar').val()
    var nama = $('#nama-s').val()
    $('#data-form').on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: "/bayar-kurban/"+id,
            method: "POST",
            data:new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success:function(data) {
                if($.isEmptyObject(data.error)){
                    read()
                    $('#btn-close').click();
                    $('.err-close').click();
                    $('#success').html('<div class="alert alert-success"><button type="button" class="close" id="success-close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                    $("input[name='bayar']").val("");
                    swal({
                        title: nama + " Berhasil Membayar!",
                        text: "Klik Ok untuk melanjutkan!",
                        icon: "success",
                        button: "OK",
                    });
                } else {
                    read()
                    $('#btn-close').click();
                    swal({
                        title: nama + " Gagal Membayar!",
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
function read(){
    var id = $('#id-bayar').val()
    $.get("/data-kurban/"+id+"/data", {}, function(data, status){
        $('#data-bayar').html(data)
    });
}

function editBayar(id) {
    $.get("/data-edit/"+id, {}, function(data, status){
        $('#modal-edit').html(data)
        $('#modalEditBayar').modal('show')
    });
}


//Hapus bayar kurban
function hapusBayar(id) {
    swal({
        title: "Yakin ingin hapus data bayar!",
        text: "Klik Ok untuk lanjut hapus!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "/bayar-kurban/"+id+"/delete",
                type: "GET",
                contentType: false,
                cache: false,
                processData: false,
                success:function(data) {
                    $("#success-close").click();
                    $('#success').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                    swal({
                        title: "Berhasil hapus data bayar!",
                        text: "Klik Ok untuk melanjutkan!",
                        icon: "success",
                        buttons: "OK",
                    })
                }
            });
            read();
        }
    });
}