<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\BayarKurban;
use App\Models\TypeHewan;
use Illuminate\Http\Request;
use App\Models\SohibulKurban;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\BayarKurban as ResorcesBayarKurban;

class SohibulKurbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_hewans = TypeHewan::all();
        $skurbans = SohibulKurban::with('user', 'type_hewans')->get();
        return view('sekretaris.kurbans.index', compact('skurbans', 'type_hewans'));
    }

    public function data($id)
    {
        $type_hewans = TypeHewan::all();
        $bayars = Sohibulkurban::with('type_hewans', 'bayars')->findOrFail($id);
        return view('sekretaris.kurbans.data-bayar', compact('bayars', 'type_hewans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type_hewans = TypeHewan::all();
        $bayars = Sohibulkurban::with('type_hewans', 'bayars')->findOrFail($id);
        return view('sekretaris.kurbans.kurban-detail', compact('bayars', 'type_hewans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        return redirect('/sohibul-kurban')->with(['success' => 'Data sohibul kurban ' . $sohibulkurban->nama . ' berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sohibulkurban = Sohibulkurban::find($id);

        $sohibulkurban->delete();
        return redirect('/sohibul-kurban')->with(['success' => 'Data sohibul kurban ' . $sohibulkurban->nama . ' beserta data pembayarannya berhasil di dihapus']);
    }

    public function getkurbans()
    {
        $datakurbans = Sohibulkurban::with('type_hewans')->get();

        return Datatables::of($datakurbans)
            ->addColumn('type', function ($s) {
                return $s->type_hewans->type;
            })
            ->addColumn('harga', function ($s) {
                return 'Rp.' . number_format($s->type_hewans->harga);
            })
            ->addColumn('detail', function ($s) {
                return '<center><a href="/sohibul-kurban/' . $s->id . '"><b style="font-size: 25px;">&raquo</b></a></center>';
            })
            ->rawColumns(['type', 'harga', 'detail'])
            ->addIndexColumn()
            ->removeColumn('id')
            ->make(true);
    }

    public function bayar_kurban(Request $request, $id)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            "bayar" => 'required|integer',
        ]);

        if ($validator->passes()) {
            $user->bayars()->create([
                'bayar' => $request->bayar,
                'sohibul_kurban_id' => $id,
                'user_id' => $user->id
            ]);
            return response()->json(['success' => 'Bayar berhasil']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function dataBayar($id)
    {
        $bayar = BayarKurban::findOrFail($id);
        return view('sekretaris.kurbans.data-edit', compact('bayar'));
    }

    public function update_bayar_kurban(Request $request, $id)
    {
        $bayarKurban = BayarKurban::findOrFail($id);

        $validator = Validator::make($request->all(), [
            "bayar" => 'required|integer',
        ]);

        if ($validator->passes()) {
            $bayarKurban->update([
                'bayar' => $request->bayar,
            ]);
            return response()->json(['success' => 'Edit bayar berhasil']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function delete_bayar($id)
    {
        $dataBayar = BayarKurban::find($id);

        $dataBayar->delete();
        return response()->json(['success' => 'Data bayar Rp.'  . number_format($dataBayar->bayar) . ' pada hari ' . $dataBayar->created_at->isoFormat('dddd, D MMMM Y') . ' berhasil di hapus!']);
    }
}
