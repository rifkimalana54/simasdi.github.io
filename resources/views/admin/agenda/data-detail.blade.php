<div class="card mb-4 p-5">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="mb-3 text-center">
                    <span style="font-size: 30px;">
                        <b>Badan Kemakmuran Masjid Pusaka Gerilya</b><br>
                        Desa Wanasaba Kidul Kecamatan Talun
                    </span><br>
                    Jl. Syekh Nurjati Desa Wanasaba Kidul, Kecamatan Talun, Kabupaten Cirebon 41571
                </div><hr>
                <table class="float-left">
                    <tr>
                        <td>Nomor</td>
                        <td>: 41571</td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>: -</td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td>: Undangan {{$agenda->title}}</td>
                    </tr>
                </table>
                
                <table class="float-right">
                    <tr>
                        <td></td>
                        <td>Cirebon, {{date('d/M/Y')}}</td>
                    </tr>
                    <tr>
                        <td>Yth</td>
                        <td>: Seluruh Anggota BKM</td>
                    </tr>
                </table>
                <div style="clear: both">

                </div>
                <div class="mt-3">
                    <p>Assalamu'alaikum Wr. Wb</p>
                    <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;{{$agenda->deskripsi}}</p>
                </div>
                <div class="mt-3 ml-5">
                    <table>
                        <tr>
                            <td width="80px">Tanggal </td>
                            <td> : {{$agenda->tgl_pelaksanaan->isoFormat('dddd, D MMMM Y')}}</td>
                        </tr>
                        <tr>
                            <td>jam </td>
                            <td> : {{$agenda->jam}}</td>
                        </tr>
                        <tr>
                            <td>Tempat </td>
                            <td> : {{$agenda->tempat}}</td>
                        </tr>
                    </table>
                </div>
                <div class="mt-3">
                    <p>Diharapkan untuk kehadirannya. Demikian surat ini kami sampaikan, atas perhatian dan kehadirannya kami ucapkan terima kasih.<br><br>
                        Wassalamu'alaikum Wr. Wb
                    </p>
                </div>
                <div style="float: right; margin: 25px 50px 0 0">
                    <div style="height: 75px;">
                        Ketua BKM:
                    </div>
                    <div>
                        Nama Ketua BKM
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>