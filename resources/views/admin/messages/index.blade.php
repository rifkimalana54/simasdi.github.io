@extends('admin.template')
@section('title', "Message")
@section('content')
    <div class="mb-4">
        <h4>
            <i class="fas fa-fw fa-inbox"></i> Inbox
        </h4>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary float-left">Table Inbox</h6>
                    </div>
                    <div class="card-body" id="data-baru">
                        
                    </div>
                </div>

            </div>
            <div class="col-lg-6" id="msg-detail">

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            newData();
        });
        function detailNotif(id){
            $.get('/baca/pesan/'+id, {}, function(data, status) {
                $('#msg-detail').html(data);
            });
            newData();
        }

        function newData() {
            $.get('/data-messages', {}, function(data, status) {
                $('#data-baru').html(data);
            })
        }
    </script>
    
@endsection