$(document).ready(function(){
    fetch_customer_data();
    function fetch_customer_data(query = ''){
        $.ajax({
            url: "/data-bkm/cari",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data) {
                $('tbody').html(data.table_data);
                $('#total_records').text(data.total_data);
            }
        })
    }

    $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});

function preview() {
    document.getElementById('previewImg').src = URL.createObjectURL(event.target.files[0])
}

//Menambahkan Anggota Bkm
$(document).ready(function() {
    read()
    $('#upload_form').on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: "/anggota-store",
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
                    $("input[name='foto']").val("");
                    $("input[name='nama']").val("");
                    $("input[name='alamat']").val("");
                    $("input[name='jabatan']").val("");
                    $("input[name='whatsapp']").val("");
                    $("input[name='facebook']").val("");
                    $("input[name='instagram']").val("");
                    swal({
                        title: "Berhasil Menambah Anggota BKM!",
                        text: "Klik Ok untuk melanjutkan!",
                        icon: "success",
                        button: "OK",
                    });
                    read();
                } else {
                    $('.btn-close').click();
                    swal({
                        title: "Gagal Menambah Anggota BKM!",
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
    $.get("/data-bkm", {}, function(data, status){
        $('#data').html(data)
    });
}

//Show Detail anggota BKM
function detail(id) {
    fetch('/anggota-bkm/'+id)
    .then(response => response.json())
    .then(data => {
        let newAnggota = renderAnggota(data.data);
        $('#data-detail').html(newAnggota);
    });
}

function renderAnggota(data) {
    return `
    <div class="row mb-2">
        <div class="col-6">
            <img src="/image/profile/${data.foto}" alt="" style="height:180px; width:100%; border-radius: 10px;">
        </div>
        <div class="col-6">
            <table class="ml-1">
                <tr>
                    <th><h5>${data.nama}</h5></th>
                </tr>
                <tr>
                    <th>${data.alamat}</th>
                </tr>
            </table>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Jabatan </th>
            <th>${data.jabatan}</th>
        </tr>
        <tr>
            <th>WhatsApp </th>
            <th><a target="_blank" href="https://wa.me/62${data.whatsapp}">+62${data.whatsapp}</a></th>
        </tr>
        <tr>
            <th>Facebook </th>
            <th>${data.facebook}</th>
        </tr>
        <tr>
            <th>Instagram </th>
            <th>${data.instagram}</th>
        </tr>
    </table>
    `;
}

//Edit Anggota BKM
function edit(id){
    $.get("/anggota-bkm/"+id+"/edit", {}, function(data, status){
        $('#data-edit').html(data)
        $('#modalEdit').modal('show');
    });
}

//Hapus Anggota Bkm
function hapus(id) {
    swal({
        title: "Yakin ingin hapus Anggota BKM!",
        text: "Klik Ok untuk lanjut hapus!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "/anggota-bkm/"+id+"/delete",
                type: "GET",
                contentType: false,
                cache: false,
                processData: false,
                success:function(data) {
                    $("#success-close").click();
                    $("#btn-closeupdate").click();
                    $('#success').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">x</button><b>'+data.success+'</b></div>');
                    swal({
                        title: "Berhasil hapus anggota BKM!",
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