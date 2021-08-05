<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Tabel Data Anggota BKM</h6>
        <div class="float-right d-flex">
            <input type="text" name="search" id="search" placeholder="Cari..." class="form-control" style="width: 250px;" autocomplete="off" />
            <i class="fas fa-search fa-sm textk-50" style="margin: 13px 0 0 -25px"></i>
        </div>
    </div>

    <div class="card-body">
        @if ($anggotas->isEmpty())
            <div class="text-center">
                Belum ada anggota BKM!
            </div>
        @else
            <div class="table-responsive border">
                <table class="table table-striped table-bordered" id="tableBkm">
                    <thead>
                        <tr  class="table-active">
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>WhatsApp</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th width="150" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $i = 1;
                            @endphp
                                @foreach ($anggotas as $anggota)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{url('image/profile/'.$anggota->foto)}}" height="60" width="50"></td>
                                    <td>{{$anggota->nama}}</td>
                                    <td>{{$anggota->alamat}}</td>
                                    <td>{{$anggota->jabatan}}</td>
                                    <td>+62{{$anggota->whatsapp}}</td>
                                    <td>{{$anggota->facebook}}</td>
                                    <td>{{$anggota->instagram}}</td>
                                    <td>
                                        <button onclick="detail({{$anggota->id}})" class="btn btn-sm btn-primary ml-1 mb-1 shadow-sm" data-toggle="modal" data-target="#modalDetail">
                                            <i class="fas fa-info-circle fa-sm textk-50"></i>
                                        </button>
                                        <button onclick="edit({{$anggota->id}})" class="btn btn-sm btn-primary ml-1 mb-1 shadow-sm">
                                            <i class="fas fa-edit fa-sm textk-50"></i>
                                        </button>
                                        <button onclick="hapus({{$anggota->id}})" class="delete-bayar btn btn-sm btn-danger ml-1 shadow-sm">
                                            <i class="fas fa-trash fa-sm textk-50"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                    {{-- <div id="total_records"></div> --}}
                </table>
            </div>
        @endif
    </div>
</div>