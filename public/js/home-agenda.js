function agenda(id) {
    fetch('/agenda-id/' + id)
    .then(response => response.json())
    .then(data => {
        let newAgenda = renderAgenda(data.data)
        document.getElementById('agenda-modal').innerHTML = newAgenda
    })
}

function renderAgenda(data) {
    return `
        <div class="modal-header">
            <h5 class="modal-title">Detail Agenda</h5>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
            <div>
                <img src="https://i.pinimg.com/originals/59/b5/12/59b512501a37ad3b38d7eb91cdf15504.jpg" style="width: 100%;" height="250px;" alt="">
            </div>
            <div class="alert alert-dark mt-1" role="alert">
                <b>${data.title}</b>
            </div>
            <div style="text-align: justify;">
                ${data.deskripsi}
            </div>
            <table class="table table-striped table-bordered">
                <tr>
                    <th width="200">Tanggal Pelaksanaan </th>
                    <th>  ${data.tgl_pelaksanaan}</th>
                </tr>
                <tr>
                    <th>Jam </th>
                    <th>  ${data.jam}</th>
                </tr>
                <tr>
                    <th>Tempat </th>
                    <th>  ${data.tempat}</th>
                </tr>
            </table>
        </div>
    `;
}function agenda(id) {
    fetch('/agenda-id/' + id)
    .then(response => response.json())
    .then(data => {
        let newAgenda = renderAgenda(data.data)
        document.getElementById('agenda-modal').innerHTML = newAgenda
    })
}

function renderAgenda(data) {
    return `
        <div class="modal-header">
            <h5 class="modal-title">Detail Agenda</h5>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
            <div>
                <img src="http://4.bp.blogspot.com/-lftWYzJb748/TavDQrOFM0I/AAAAAAAACG0/U6pXYkUkFWA/s1600/Makkah+13+April+2011.jpg" style="width: 100%;" height="250px;" alt="">
            </div>
            <div class="alert alert-dark mt-1" role="alert">
                <b>${data.title}</b>
            </div>
            <div style="text-align: justify;">
                ${data.deskripsi}
            </div>
            <table class="table table-striped table-bordered">
                <tr>
                    <th width="200">Tanggal Pelaksanaan </th>
                    <th>  ${data.tgl_pelaksanaan}</th>
                </tr>
                <tr>
                    <th>Jam </th>
                    <th>  ${data.jam}</th>
                </tr>
                <tr>
                    <th>Tempat </th>
                    <th>  ${data.tempat}</th>
                </tr>
            </table>
        </div>
    `;
}