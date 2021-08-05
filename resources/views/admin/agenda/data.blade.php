<div class="card shadow mb-1">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Agenda</h6>
    </div>
    <div class="card-body">
        @if ($agendas->isEmpty())
            <div class="text-center text-danger">
                <p>Belum ada agenda di buat!</p>
            </div>
        @else
            <table class="table">
                <tbody>
                    @foreach ($agendas as $agenda)
                        <tr class="border-bottom">
                            <td width="20"><img src="https://pic.onlinewebfonts.com/svg/img_51070.png" alt="" width="40"></td>
                            <td>
                                <a href="/agenda/{{$agenda->id}}"><b>{{$agenda->title}}</b></a><br>
                                <small>
                                    <i class="fa fa-calendar"></i> 
                                    Dilaksanakan::| {{$agenda->tgl_pelaksanaan->isoFormat('dddd, D MMMM Y')}} {{$agenda->jam}}
                                </small>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>