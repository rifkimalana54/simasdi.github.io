//Halaman index Sohibul kurban
$(document).ready(function() {
    $('#form-sohibul-kurban').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: '/halaman-sohibul-kurban',
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data) {
                if($.isEmptyObject(data.error)){
                    $('.close-modal-sohibul').click();
                    $('.err-close').click();
                    $("input[name='nama']").val("");
                    $("input[name='alamat']").val("");
                    $("input[name='no_telepon']").val("");
                    $("select[name='type_hewan']").val("");
                    swal({
                        title: "Berhasil Menambahkan Sohibul Kurban!",
                        text: "Klik Ok untuk melanjutkan!",
                        icon: "success",
                        button: "OK",
                    });
                    $('#success').html('<div class="alert alert-success"><button type="button" class="close" id="success-close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                } else {
                    $('.close-modal-sohibul').click();
                    $('#success-close').click();
                    swal({
                        title: "Gagal Menambahkan Sohibul Kurban!",
                        text: "Klik Ok untuk melanjutkan!",
                        icon: "error",
                        button: "OK",
                    });
                    errorMessage(data.error)
                }
            }
        });
        function errorMessage(msg){
            $("#error").find("ul").html('');
            $("#error").css('display','block');
            $.each(msg, function( key, value ) {
                $("#error").find("ul").append('<li>'+value+'</li>');
            });
        }
    })
})

// Hapus anggota sohibul kurban
$('.delete-sohibulkurban').click(function () {
    
    var sohibulkurban_id = $(this).attr('sohibulkurban-id');
    swal({
        title: "Yakin ingin dihapus?",
        text: "Jika Sohbul Kurban dihapus, data pembayarannya juga akan terhapus!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/halaman-sohibul-kurban/" + sohibulkurban_id + '/delete';
        }
    });
});