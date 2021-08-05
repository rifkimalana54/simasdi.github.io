@extends('admin.template')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-edit fa-sm textk-50"></i> Edit Agenda
        </h1>
    </div>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Form Edit Agenda
            </div>
            <div class="card-body">
                <form action="/agenda/{{$agenda->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control" value="{{$agenda->title}}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" name="deskripsi" class="form-control" style="height: 150px;">{{$agenda->deskripsi}}</textarea>
                        @error('deskripsi')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pelaksanaan</label>
                        <input type="date" name="tgl_pelaksanaan" class="form-control" value="{{$agenda->tgl_pelaksanaan}}" style="width: 50%">
                        @error('tgl_pelaksanaan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Jam</label>
                        <input type="time" name="jam" class="form-control" value="{{$agenda->jam}}" style="width: 200px">
                        @error('jam')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <x-input title="Tempat" type="text" name="tempat" :object="$agenda" />
                    @error('tempat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div>
                        <button class="btn btn-primary mr-1" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection