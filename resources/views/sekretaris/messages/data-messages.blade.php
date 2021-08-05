@if ($notify->isEmpty())
    <div class="text-center">Tidak ada pesan!</div>
@else
    <div class="table-responsive">
        <table class="table" id="myTable">
            <thead>
                <tr class="table">
                    <th>No</th>
                    <th>Dari</th>
                    <th width="50">Detail</th>
                </tr>
            </thead>
            <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($notify as $notif)
                        <tr class="{{($notif->see) ? 'text-dark' : 'text-primary'}}" style="cursor: pointer" onclick="detailNotif({{$notif->id}})">
                            <td>{{$i++}}</td>
                            <td>{{$notif->nama}}</td>
                            <td style="text-align: center;"><i style="font-size: 25px;">&raquo;</i></td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endif