<?php

use App\Models\Agenda;
use App\Models\AnggotaBkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Galery as GaleryResource;
use App\Http\Resources\Agenda as AgendaResource;
use App\Http\Resources\AnggotaBkm as AnggotaBkmResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return AgendaResource::collection(Agenda::all());
});

Route::get('/bkm', function () {
    return AnggotaBkmResource::collection(AnggotaBkm::all());
});

Route::get('/galery', function () {
    return GaleryResource::collection(DB::table('galerys')->get());
});
