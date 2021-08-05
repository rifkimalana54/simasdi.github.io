<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporans.laporan');
    }

    public function data()
    {
        $pemasukans = Laporan::whereNotNull('pemasukan')->orderBy('id', 'desc')->take(20)->get();
        $seluruh_pemasukan = Laporan::sum('pemasukan');

        $pengeluarans = Laporan::whereNotNull('pengeluaran')->orderBy('id', 'desc')->take(20)->get();
        $seluruh_pengeluaran = Laporan::sum('pengeluaran');
        return view('admin.laporans.data-laporan', compact('pemasukans', 'seluruh_pemasukan', 'pengeluarans', 'seluruh_pengeluaran'));
    }

    public function create()
    {
        return view('admin.laporans.laporan-pemasukan-create');
    }

    public function show()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            "dari" => 'required|max:100|min:3',
            "deskripsi" => 'required|max:200|min:10',
            "pemasukan" => 'required|integer',
        ]);

        if ($validator->passes()) {
            $user->laporans()->create([
                'dari' => $request->dari,
                'deskripsi' => $request->deskripsi,
                'pemasukan' => $request->pemasukan,
            ]);
            return response()->json(['success' => 'Berhasil Membuat Laporan pemasukan!']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.laporans.data-edit-pemasukan', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        $validator = Validator::make($request->all(), [
            "dari" => 'required|max:100|min:3',
            "deskripsi" => 'required|max:200|min:10',
            "pemasukan" => 'required|integer',
        ]);

        if ($validator->passes()) {
            $laporan->update([
                'dari' => $request->dari,
                'deskripsi' => $request->deskripsi,
                'pemasukan' => $request->pemasukan,
            ]);
            return response()->json(['success' => 'Berhasil Update Laporan pemasukan!']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function deletePemasukan($id)
    {
        $pemasukan = Laporan::findOrFail($id);

        $pemasukan->delete();
        return response()->json(['success' => 'Data pemasukan pada ' . $pemasukan->created_at->isoFormat('dddd, D MMMM Y ') . 'berhasil dihapus!']);
    }

    /* 
    Laporan Pengeluaran
    */
    public function store_pengeluaran(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            "deskripsi" => 'required|max:200|min:8',
            "kebutuhan" => 'required|max:100|min:10',
            "pengeluaran" => 'required|integer',
        ]);

        if ($validator->passes()) {
            $user->laporans()->create([
                'deskripsi' => $request->deskripsi,
                'kebutuhan' => $request->kebutuhan,
                'pengeluaran' => $request->pengeluaran,
            ]);
            return response()->json(['success' => 'Berhasil Membuat Laporan Pengeluaran!']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function editPengeluaraan($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.laporans.data-edit-pengeluaran', compact('laporan'));
    }

    public function updatePengeluaran(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        $validator = Validator::make($request->all(), [
            "deskripsi" => 'required|max:200|min:8',
            "kebutuhan" => 'required|max:100|min:10',
            "pengeluaran" => 'required|integer',
        ]);

        if ($validator->passes()) {
            $laporan->update([
                'deskripsi' => $request->deskripsi,
                'kebutuhan' => $request->kebutuhan,
                'pengeluaran' => $request->pengeluaran,
            ]);
            return response()->json(['success' => 'Berhasil Update Laporan Pengeluaran!']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function deletePengeluaran($id)
    {
        $pengeluaran = Laporan::findOrFail($id);

        $pengeluaran->delete();
        return response()->json(['success' => 'Data pengeluaran pada ' . $pengeluaran->created_at->isoFormat('dddd, D MMMM Y ') . 'berhasil dihapus!']);
    }
}
