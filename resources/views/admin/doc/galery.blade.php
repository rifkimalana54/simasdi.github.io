@extends('admin.template')
@section('title', 'Galery')
@section('sidebar-halaman')
    class="collapse show"
@endsection
@section('content')
    <div class="mb-4">
        <button class="btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#exampleModal" style="width: 100%;">
            <i class="fas fa-plus fa-sm textk-50"></i> Tambahkan Foto
        </button>
    </div>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong>
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <b>Gagal menambahkan documentasi foto!</b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                @if($galerys->isEmpty())
                    <div class="text-center">Belum ada foto!</div>
                @else
                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($galerys as $galery)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <img src="{{url('image/galery/'.$galery->gambar)}}" class="img-fluid" alt="{{$galery->text}}">
                                <small>{{$galery->text}}</small><p style="cursor: pointer;" class="delete-gambar float-right text-dark" id-gambar="{{$galery->id}}">X</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        {{$galerys->links()}}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('modal')
    {{-- Modal Tambah Anggota Sohibul Kurban --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus fa-sm textk-50"></i> Tambahkan Foto
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/doc/galery-create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="my-2 text-center">
                                <img id="previewImg" src="" style="width: 250px;" class="img-fluid"/>
                            </div>
                            <input type="file" onchange="preview()" id="select_file" name="gambar" class="form-control-input">
                        </div>
                        <x-input title="Text" name="text" type="text" />
                        <div class="float-right">
                            <button type="button" class="btn btn-secondary close-modal-sohibul mr-1" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="upload" value="Kirim">
                        </div>
                    </form>
                    <script>
                        function preview() {
                            document.getElementById('previewImg').src = URL.createObjectURL(event.target.files[0])
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $('.delete-gambar').click(function () {
    
    var galery_id = $(this).attr('id-gambar');
    swal({
        title: "Yakin ingin dihapus?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/doc/galery/" + galery_id + '/delete';
        }
    });
});
</script>
@endsection