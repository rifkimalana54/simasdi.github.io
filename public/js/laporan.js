// Laporan Pemasukan
$('#btn-pemasukan').click(function() {
    $('#modalInput').modal('show');
})

$(document).ready(function() {
    read();
    $('#form-pemasukan').on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: "/laporan-pemasukan/store",
            method: "POST",
            data:new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success:function(data) {
                read();
                if($.isEmptyObject(data.error)){
                    $('.close-pemasukan').click();
                    $('#err-close').click();
                    $('#success').html('<div class="alert alert-success"><button type="button" class="close" id="success-close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                    $("#dari-pemasukan").val("");
                    $("#keterangan-pemasukan").val("");
                    $("#jumlah-pemasukan").val("");
                    swal({
                        title: "Berhasil Membuat Laporan pemasukan!",
                        text: "Klik Ok untuk melanjutkan!",
                        icon: "success",
                        button: "OK",
                    });
                } else {
                    read();
                    $('.close-pemasukan').click();
                    $('#success-close').click();
                    swal({
                        title: "Gagal Membuat Laporan pemasukan!",
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


function editPemasukan(id){
    $.get("/laporan-pemasukan/"+id, {}, function(data, status){
        $('#modalEditPemasukan').modal('show');
        $('#data-edit-pemasukan').html(data)
    });
}

$(document).ready(function() {
    read();
    $('#form-edit-pemasukan').on("submit", function(e) {
        e.preventDefault();
        var id = $('#id-pemasukan').val();
        $.ajax({
            url: "/laporan-pemasukan/"+id+"/update",
            method: "POST",
            data:new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success:function(data) {
                read();
                if($.isEmptyObject(data.error)){
                    $('.close-pemasukan').click();
                    $('.err-close').click();
                    $('#success').html('<div class="alert alert-success"><button type="button" class="close" id="success-close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                    swal({
                        title: "Berhasil Update Laporan pemasukan!",
                        text: "Klik Ok untuk melanjutkan!",
                        icon: "success",
                        button: "OK",
                    });
                } else {
                    read();
                    $('.close-pemasukan').click();
                    $('#success-close').click();
                    swal({
                        title: "Gagal Update Laporan pemasukan!",
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

function hapusPemasukan(id) {
    swal({
        title: "Yakin ingin hapus data pemasukan?",
        text: "Klik Ok untuk lanjut hapus!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "/laporan-pemasukan/"+id+"/delete",
                type: "GET",
                contentType: false,
                cache: false,
                processData: false,
                success:function(data) {
                    $("#success-close").click();
                    $('#success').html('<div class="alert alert-success"><button type="button" class="close" id="success-close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                    swal({
                        title: "Berhasil hapus data pemasukan!",
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

$('#btn-pengeluaran').click(function() {
    $('#modalInputPengeluaran').modal('show');
});

// Laporan Pengeluaran

$(document).ready(function() {
    read();
    $('#form-pengeluaran').on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: "/laporan-pengeluaran/store",
            method: "POST",
            data:new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success:function(data) {
                read();
                if($.isEmptyObject(data.error)){
                    $('.close-pengeluaran').click();
                    $('#err-close').click();
                    $('#success').html('<div class="alert alert-success"><button type="button" class="close" id="success-close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                    $("#kebutuhan-pengeluaran").val("");
                    $("#deskripsi-pengeluaran").val("");
                    $("#jumlah-pengeluaran").val("");
                    swal({
                        title: "Berhasil Membuat Laporan Pengeluaran!",
                        text: "Klik Ok untuk melanjutkan!",
                        icon: "success",
                        button: "OK",
                    });
                } else {
                    read();
                    $('.close-pengeluaran').click();
                    $('#success-close').click();
                    swal({
                        title: "Gagal Membuat Laporan Pengeluaran!",
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

function editPengeluaran(id){
    $.get("/laporan-pengeluaran/"+id, {}, function(data, status){
        $('#modalEditPengeluaran').modal('show');
        $('#data-edit-pengeluaran').html(data)
    });
}

$(document).ready(function() {
    read();
    $('#form-edit-pengeluaran').on("submit", function(e) {
        e.preventDefault();
        var id_pengeluaran = $('#id-pengeluaran').val();
        $.ajax({
            url: "/laporan-pengeluaran/"+id_pengeluaran+"/update",
            method: "POST",
            data:new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success:function(data) {
                read();
                if($.isEmptyObject(data.error)){
                    $('.close-pengeluaran').click();
                    $('.err-close').click();
                    $('#success').html('<div class="alert alert-success"><button type="button" class="close" id="success-close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                    swal({
                        title: "Berhasil Update Laporan pengeluaran!",
                        text: "Klik Ok untuk melanjutkan!",
                        icon: "success",
                        button: "OK",
                    });
                } else {
                    read();
                    $('.close-pengeluaran').click();
                    $('#success-close').click();
                    swal({
                        title: "Gagal Update Laporan Pengeluaran!",
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

function hapusPengeluaran(id) {
    swal({
        title: "Yakin ingin hapus data pengeluaran?",
        text: "Klik Ok untuk lanjut hapus!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "/laporan-pengeluaran/"+id+"/delete",
                type: "GET",
                contentType: false,
                cache: false,
                processData: false,
                success:function(data) {
                    $("#success-close").click();
                    $('#success').html('<div class="alert alert-success"><button type="button" class="close" id="success-close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                    swal({
                        title: "Berhasil hapus data pemasukan!",
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



function read(){
    $.get("/data-laporan", {}, function(data, status){
        $('#table_laporan').html(data)
    });
}

