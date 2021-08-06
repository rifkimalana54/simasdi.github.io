<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\TypeHewan;
use Illuminate\Http\Request;
use App\Models\SohibulKurban;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class KurbanController extends Controller
{
    public function index()
    {
        $type_hewans = TypeHewan::all();
        // $skurbans = Sohibulkurban::with('user', 'type_hewans')->get();
        return view('admin.kurbans.index', compact('type_hewans'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            "nama" => 'required|max:100|min:3',
            "alamat" => 'required|max:100',
            "no_telepon" => 'required|max:15',
        ]);

        if ($validator->passes()) {
            $user->sohibulkurban()->create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'type_hewan_id' => $request->type_hewan,
            ]);

            return response()->json(['success' => 'Berhasil Menambahkan Sohibul Kurban!']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function show($id)
    {
        $type_hewans = TypeHewan::all();
        $bayars = Sohibulkurban::with('bayars', 'type_hewans')->findOrFail($id);
        return view('admin.kurbans.kurban-detail', compact('bayars', 'type_hewans'));
    }

    public function edit()
    {
        //
    }

    public function update(Request $request, $id)
    {
        $sohibulkurban = Sohibulkurban::findOrFail($id);
        $request->validate([
            "nama" => 'required|max:100|min:3',
            "alamat" => 'required|max:100',
            "no_telepon" => 'required|max:15',
        ]);

        $sohibulkurban->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'type_hewan_id' => $request->type_hewan,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/halaman-sohibul-kurban')->with(['success' => 'Data sohibul kurban ' . $sohibulkurban->nama . ' berhasil di edit']);
    }

    public function destroy($id)
    {
        $sohibulkurban = Sohibulkurban::find($id);

        $sohibulkurban->delete();
        return redirect('/halaman-sohibul-kurban')->with(['success' => 'Data sohibul kurban ' . $sohibulkurban->nama . ' beserta data pembayarannya berhasil di dihapus']);
    }

    public function getkurbans()
    {
        $datakurbans = SohibulKurban::with('type_hewans')->get();

        return Datatables::of($datakurbans)
            ->addColumn('type', function ($s) {
                return $s->type_hewans->type;
            })
            ->addColumn('harga', function ($s) {
                return 'Rp.' . number_format($s->type_hewans->harga);
            })
            ->addColumn('detail', function ($s) {
                return '<center><a href="/halaman-sohibul-kurban/' . $s->id . '"><b style="font-size: 25px;">&raquo</b></a></center>';
            })
            ->rawColumns(['type', 'harga', 'detail'])
            ->addIndexColumn()
            ->removeColumn('id')
            ->make(true);
    }
}
