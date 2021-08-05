$(document).ready(function(){
    newData();
});
function detailNotif(id){
    $.get('/sekretaris/baca/pesan/'+id, {}, function(data, status) {
        $('#msg-detail').html(data);
    });
    newData();
}

function newData() {
    $.get('/data-messages/sekretaris', {}, function(data, status) {
        $('#data-baru').html(data);
    })
}
