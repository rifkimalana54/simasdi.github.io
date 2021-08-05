<?php

use App\Http\Controllers\AdminAnggotaController;
use App\Http\Controllers\SekretarisController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\KurbanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaBkmController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\IrmasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SohibulKurbanController;
use App\Http\Middleware\CheckSekretaris;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckIrmas;
use Illuminate\Support\Facades\DB;
use App\Models\AnggotaBkm;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $galerys = DB::table('galerys')->paginate(9);
    $setting = Setting::first();
    $bkms = AnggotaBkm::take(4)->get();
    return view('welcome', compact('setting', 'bkms', 'galerys'));
});

Auth::routes(
    ['register' => false]
);

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route Admin
Route::middleware([CheckAdmin::class])->group(function () {
    Route::get('/dashboard-admin', [AdminController::class, 'index']);
    //Route Agenda
    Route::resource('/agenda', AgendaController::class);
    Route::get('/read', [AgendaController::class, 'data']);
    Route::put('/agenda/{id}', [AgendaController::class, 'update']);
    Route::get('/read-detail/{id}', [AgendaController::class, 'readDetail']);
    Route::get('/agenda/{id}/delete', [AgendaController::class, 'destroy']);
    Route::get('/agenda-cetak/{id}', [AgendaController::class, 'getAgenda']);
    //Rote Galery
    Route::get('doc/galery', [GaleryController::class, 'index']);
    Route::post('doc/galery-create', [GaleryController::class, 'store']);
    Route::get('doc/galery/{id}/delete', [GaleryController::class, 'destroy']);

    // Route Kurban
    Route::resource('/halaman-sohibul-kurban', KurbanController::class);
    Route::get('/halaman-sohibul-kurban/{id}/delete', [KurbanController::class, 'destroy']);
    Route::get('/get-data-kurban', [KurbanController::class, 'getkurbans']);
    //Route Anggota Halaman Admin
    Route::get('/halaman/anggota-bkm', [AdminAnggotaController::class, 'index']);
    Route::get('/get-anggota-bkm', [AdminAnggotaController::class, 'getAnggotas']);
    Route::get('/admin-anggota-bkm/{id}', [AdminAnggotaController::class, 'getDetail']);
    // Route Laporan pemasukan
    Route::get('/laporan-pemasukan', [LaporanController::class, 'index']);
    Route::get('/data-laporan', [LaporanController::class, 'data']);
    Route::post('/laporan-pemasukan/store', [LaporanController::class, 'store']);
    Route::get('/laporan-pemasukan/{id}', [LaporanController::class, 'edit']);
    Route::post('/laporan-pemasukan/{id}/update', [LaporanController::class, 'update']);
    Route::get('/laporan-pemasukan/{id}/delete', [LaporanController::class, 'deletePemasukan']);
    // Route Laporan pengeluaran
    Route::post('/laporan-pengeluaran/store', [LaporanController::class, 'store_pengeluaran']);
    Route::get('/laporan-pengeluaran/{id}', [LaporanController::class, 'editPengeluaraan']);
    Route::post('/laporan-pengeluaran/{id}/update', [LaporanController::class, 'updatePengeluaran']);
    Route::get('/laporan-pengeluaran/{id}/delete', [LaporanController::class, 'deletePengeluaran']);
    //Route Setting aplikasi
    Route::get('/setting-app', [AdminController::class, 'settings']);
    Route::put('/setting-app/update', [AdminController::class, 'updateApp']);
    //Message
    Route::get('/messages', [AdminController::class, 'homeMessage']);
    Route::get('/data-messages', [AdminController::class, 'allMessage']);
    Route::get('/baca/pesan/{id}', [AdminController::class, 'readyMessage']);
});

//Route Sekretaris
Route::middleware([CheckSekretaris::class])->group(function () {
    Route::get('/dashboard-sekretaris', [SekretarisController::class, 'index']);
    //Route Kurban
    Route::resource('/sohibul-kurban', SohibulKurbanController::class);
    Route::get('/data-kurban/{id}/data', [SohibulKurbanController::class, 'data']);
    Route::get('/sohibul-kurban/{id}/delete', [SohibulKurbanController::class, 'destroy']);
    Route::get('/data-kurban', [SohibulKurbanController::class, 'getkurbans']);
    //Route Bayar Kurban
    Route::post('/bayar-kurban/{id}', [SohibulKurbanController::class, 'bayar_kurban']);
    // Route::get('edit-bayar/{id}', [SohibulKurbanController::class, 'getIdBayar']);
    Route::get('/data-edit/{id}', [SohibulKurbanController::class, 'dataBayar']);
    Route::put('/edit-bayar/{id}', [SohibulKurbanController::class, 'update_bayar_kurban']);
    Route::get('/bayar-kurban/{id}/delete', [SohibulKurbanController::class, 'delete_bayar']);
    //Route Anggota Bkm
    Route::get('/anggota-bkm', [AnggotaBkmController::class, 'index']);
    Route::post('/anggota-store', [AnggotaBkmController::class, 'store']);
    Route::get('/anggota-bkm/{id}', [AnggotaBkmController::class, 'show']);
    Route::get('/anggota-bkm/{id}/edit', [AnggotaBkmController::class, 'edit']);
    Route::put('/anggota-bkm/{id}/update', [AnggotaBkmController::class, 'update']);
    Route::get('/anggota-bkm/{id}/delete', [AnggotaBkmController::class, 'destroy']);
    Route::get('/data-bkm', [AnggotaBkmController::class, 'read']);
    Route::get('/data-bkm/cari', [AnggotaBkmController::class, 'search']);
    Route::get('/messages/sekretaris', [SekretarisController::class, 'homeMessage']);
    Route::get('/data-messages/sekretaris', [SekretarisController::class, 'allMessage']);
    Route::get('/sekretaris/baca/pesan/{id}', [SekretarisController::class, 'readyMessage']);
});

//Route Irmas
Route::middleware([CheckIrmas::class])->group(function () {
    Route::get('/irmas', [IrmasController::class, 'index']);
});

Route::get('/waktu-sholat', [HalamanController::class, 'getWaktuSholat']);

//Route Agenda
Route::get('/daftar-agenda', [HalamanController::class, 'getAgenda']);
Route::get('/agenda-{id}/detail', [HalamanController::class, 'detailAgenda']);
Route::get('/agenda-id/{id}', [HalamanController::class, 'getIdAgenda']);
//Route Laporan
Route::get('laporan', [HalamanController::class, 'laporan']);

//Route Sohibul Kurban
Route::get('/daftar-sohibul-kurban', [HalamanController::class, 'sohibulKurban']);
Route::get('/daftar-sohibul-kurban/cari', [HalamanController::class, 'search']);
Route::get('/daftar-sohibul-kurban/{id}', [HalamanController::class, 'sohibulKurbanDetail']);
Route::get('/home-anggota-bkm', [HalamanController::class, 'bkmAnggotas']);
Route::get('/data-anggota-bkm/cari', [HalamanController::class, 'searchBkm']);
Route::post('/send-message', [HalamanController::class, 'sendMessage']);
Route::get('/notif/count', [HalamanController::class, 'notifyCount']);
Route::get('/baca-quran', [HalamanController::class, 'apiQuran']);
Route::get('/baca-quran/{id}/{surah}/{ayat}', [HalamanController::class, 'isiSurah']);
Route::get('/halaman/galery', [HalamanController::class, 'galerys']);
Route::get('/loadmore/{time}', [HalamanController::class, 'loadmore']);
