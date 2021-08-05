<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Detail Inbox</h6>
    </div>
    <div class="card-body">
        <div class="mb-2">
            <h3>{{$dataDetail->subject}}</h3>
        </div>
        <div class="mb-2">
            <small class="float-right">{{$dataDetail->created_at->diffForHumans()}}</small>
            <h5 style="margin-bottom: 0;"><b>{{$dataDetail->nama}}</b></h5>
            <small style="margin-top: -10px;"><a href="mailto:{{$dataDetail->email}}">{{$dataDetail->email}}</a></small>
        </div>
        <div>
            <p style="text-align: justify;">{{$dataDetail->text}}</p>
        </div>
    </div>
</div>