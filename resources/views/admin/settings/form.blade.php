@extends('admin.template')
@section('title', "Setting Aplikasi")
@section('content')
    <div class="d-flex mb-4">
        <h1 class="h3 mb-0 text-gray-800 mr-auto">Setting Aplikasi</h1>
    </div>

    <div class="container-fluid">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong>
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h5><b>Gagal Update Aplikasi</b></h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/setting-app/update" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Kontak</h6>
                        </div>
                        <div class="card-body">
                            <x-input title="Alamat" type="text" name="alamat" :object="$data"/>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <x-input title="Email" type="text" name="email" :object="$data"/>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <x-input title="No Telepon" type="text" name="no_telepon" :object="$data"/>
                            @error('no_telepon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Sosial Media</h6>
                        </div>
                        <div class="card-body">
                            <x-input title="Twitter" type="text" name="twitter" :object="$data"/>
                            @error('twitter')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <x-input title="Facebook" type="text" name="facebook" :object="$data"/>
                            @error('facebook')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <x-input title="Instagram" type="text" name="instagram" :object="$data"/>
                            @error('instagram')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <x-input title="WhatsApp" type="text" name="whatsapp" :object="$data"/>
                            @error('whatsapp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Visi & Misi</h6>
                        </div>
                        <div class="card-body">
                            <x-textarea title="Visi" type="text" name="visi" :object="$data"/>
                            <x-textarea title="Misi" type="text" name="misi" :object="$data"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Ayo Ke Masjid</h6>
                        </div>
                        <div class="card-body">
                            <x-input title="Judul 1" type="text" name="judul1" :object="$data"/>
                            <x-textarea title="Kotak 1" type="text" name="kotak1" :object="$data"/>
                            <x-input title="Judul 2" type="text" name="judul2" :object="$data"/>
                            <x-textarea title="Kotak 2" type="text" name="kotak2" :object="$data"/>
                            <x-input title="Judul 3" type="text" name="judul3" :object="$data"/>
                            <x-textarea title="Kotak 3" type="text" name="kotak3" :object="$data"/>
                            <x-input title="Judul 4" type="text" name="judul4" :object="$data"/>
                            <x-textarea title="Kotak 4" type="text" name="kotak4" :object="$data"/>
                        </div>
                    </div>
                    
                    <div class="p-2">
                        <p>Form input ini akan di tampilkan pada halaman home page aplikasi website ini dan akan dilihat oleh semua orang. Pastikan semuanya sudah terisi lengkap dan benar</p>
                    </div>
                </div>
            </div>
            <div>
                {{-- <button class="btn btn-primary float-right mb-2 mr-1" type="submit">Update Aplikasi</button> --}}
            </div>
        </form>
        
        <button class="btn btn-primary float-right mb-2 mr-1" type="submit" onclick="alert('Kamu tidak memiliki izin melakukan update!');">Update Aplikasi</button>
    </div>
@endsection