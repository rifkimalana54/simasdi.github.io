$(document).ready(function(){
    fetch_customer_data();
    function fetch_customer_data(query = ''){
        $.ajax({
            url: "/data-anggota-bkm/cari",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data) {
                $('#data').html(data.data_bkm);
            }
        })
    }

    $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});