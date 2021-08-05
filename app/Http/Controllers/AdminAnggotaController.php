<?php

namespace App\Http\Controllers;

use App\Models\AnggotaBkm;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\AnggotaBkm as ResourceAnggotaBkm;


class AdminAnggotaController extends Controller
{
    public function index()
    {
        return view('admin.anggotas.index');
    }

    public function getAnggotas()
    {
        $anggotas = AnggotaBkm::with('user')->get();
        return DataTables::of($anggotas)
            ->addColumn('foto', function ($s) {
                return '<img src="' . url("image/profile/$s->foto") . '"  width="50">';
            })
            ->addColumn('aksi', function ($s) {
                return '
                    <button onclick="detail(' . $s->id . ')" class="btn btn-sm btn-primary ml-1 mb-1 shadow-sm" data-toggle="modal" data-target="#modalDetail">
                        <i class="fas fa-info-circle fa-sm textk-50"></i>
                    </button>
                ';
            })
            ->rawColumns(['foto', 'aksi'])
            ->addIndexColumn()
            ->removeColumn('id')
            ->make(true);
    }

    public function getDetail($id)
    {
        $anggota = new ResourceAnggotaBkm(AnggotaBkm::findOrFail($id));
        return $anggota;
    }
}
