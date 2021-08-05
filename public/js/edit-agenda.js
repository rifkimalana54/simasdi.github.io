// Halaman Detail dan Edit Agenda
$(document).ready(function() {
    read()
})
var id = $("input[name='id']").val();
function read() {
    $.get("/read-detail/"+id, {}, function(data, status){
        $('#read-detail').html(data)
    });
}
$('.btn-submit').click(function(e){
    e.preventDefault();
    var _token = $("input[name='_token']").val();
    var id = $("input[name='id']").val();
    var title = $("input[name='title']").val();
    var deskripsi = $("textarea[name='deskripsi']").val();
    var tgl_pelaksanaan = $("input[name='tgl_pelaksanaan']").val();
    var jam = $("input[name='jam']").val();
    var tempat = $("input[name='tempat']").val();
    $.ajax({
        url: "/agenda/" + id,
        type: "PUT",
        data: {_token:_token, title:title, deskripsi:deskripsi, tgl_pelaksanaan:tgl_pelaksanaan, jam:jam, tempat:tempat},
        success: function(data) {
            if($.isEmptyObject(data.error)) {
                $('.btn-close').click();
                $('.err-close').click();
                swal({
                    title: "Berhasil Edit Agenda!",
                    text: "Klik Ok untuk melanjutkan!",
                    icon: "success",
                    button: "OK",
                });
                read()
                $('#print-success-msg').append('<div class="alert alert-success"><button type="button" class="close err-close" data-dismiss="alert">x</button><strong>'+data.success+'</strong></div>');
            } else {
                $('.btn-close').click();
                swal({
                    title: "Gagal Edit Agenda!",
                    text: "Klik Ok, baca keterangan diatas!",
                    icon: "error",
                    button: "OK",
                });
                printErrorMsg(data.error)
            }
        }
    });
    function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
});

//Hapus Agenda di halaman detail
$('.delete-agenda').click(function () {
    var agenda_id = $(this).attr('agenda-id');
    swal({
        title: "Yakin ingin dihapus?",
        text: "Jika Agenda dihapus, tidak bisa di kembalikan lagi!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/agenda/" + agenda_id + '/delete';
        }
    });
});