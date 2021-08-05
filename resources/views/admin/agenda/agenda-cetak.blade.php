<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak PDF</title>
</head>
<body style="padding: 2px 37px 10px 37px;" onload="window.print();">
    <center>
        <span style="font-size: 30px;">
            <b>Badan Kemakmuran Masjid Pusaka Gerilya</b><br>
            Desa Wanasaba Kidul Kecamatan Talun
        </span><br>
        Jl. Syekh Nurjati Desa Wanasaba Kidul, Kecamatan Talun, Kabupaten Cirebon 41571
    </center><hr>
    <div style="margin: 35px 0 35px 0;">
        <div>
            <table style="float: left">
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
                    <td>: Undangan</td>
                </tr>
            </table>
            <table style="float: right">
                <tr>
                    <td></td>
                    <td>Cirebon, {{date('d/M/Y')}}</td>
                </tr>
                <tr>
                    <td>Yth</td>
                    <td>: Seluruh Anggota BKM</td>
                </tr>
            </table>
        </div>
    </div>
    <div style="clear: both; ">
        {{--  --}}
    </div>
    <div style="margin: 60px 30px 0 30px;">
        <div>
            <p>Assalamu'alaikum Wr. Wb</p>
            <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$agenda->deskripsi}}</p>
        </div>
        <table style="margin: 20px 0 10px 0">
            <tr>
                <td width="80px">Acara </td>
                <td> : {{$agenda->title}}</td>
            </tr>
            <tr>
                <td>Tanggal </td>
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
        
        <div>
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
</body>
</html>