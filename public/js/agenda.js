// Halaman Agenda + Create Agenda
$(document).ready(function() {
    read()
    $(".btn-submit").click(function(e){
        e.preventDefault();
        var _token = $("input[name='_token']").val();
        var title = $("input[name='title']").val();
        var deskripsi = $("textarea[name='deskripsi']").val();
        var tgl_pelaksanaan = $("input[name='tgl_pelaksanaan']").val();
        var jam = $("input[name='jam']").val();
        var tempat = $("input[name='tempat']").val();
        $.ajax({
            url: "/agenda",
            type:'POST',
            data: {_token:_token, title:title, deskripsi:deskripsi, tgl_pelaksanaan:tgl_pelaksanaan, jam:jam, tempat:tempat},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('.err-close').click();
                    $("input[name='title']").val("");
                    $("textarea[name='deskripsi']").val("");
                    $("input[name='tgl_pelaksanaan']").val("");
                    $("input[name='jam']").val("");
                    $("input[name='tempat']").val("");
                    $('#print-success-msg').click();
                    $('#print-success-msg').append('<div class="alert alert-success"><button type="button" class="close err-close" data-dismiss="alert">x</button><strong>'+data.success+'</strong></div>');
                    swal({
                        title: "Berhasil Membuat Agenda!",
                        text: "Klik Ok untuk melanjutkan!",
                        icon: "success",
                        button: "OK",
                    });
                    read()
                }else{
                    swal({
                        title: "Gagal Membuat Agenda!",
                        text: "Klik Ok, baca keterangan diatas!",
                        icon: "error",
                        button: "OK",
                    });
                    printErrorMsg(data.error);
                }
            }
        }); 

        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });
    
});

function read(){
    $.get("/read", {}, function(data, status){
        $('#data').html(data)
    });
}

