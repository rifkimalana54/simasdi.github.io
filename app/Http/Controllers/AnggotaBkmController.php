<?php

namespace App\Http\Controllers;

use App\Models\AnggotaBkm;
use Validator;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AnggotaBkm as ResourceAnggotaBkm;

class AnggotaBkmController extends Controller
{
    public function index()
    {
        return view('sekretaris.anggotas.anggota-bkm');
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

    public function store(Request $request)
    {
        $user = Auth::user();
        $validator =  Validator::make($request->all(), [
            "foto" => 'required|image|mimes:jpg,jpeg,png,svg',
            "nama" => 'required|max:60|min:3',
            "alamat" => 'required|max:250',
            "jabatan" => 'required|max:100',
            "whatsapp" => 'required',
        ]);

        if ($validator->passes()) {
            $fotoImg = $request->file('foto');
            $newName = rand() . '-' . time() . '.' . $fotoImg->getClientOriginalExtension();
            $fotoImg->move(public_path('image/profile'), $newName);
            $user->anggota_bkm()->create([
                "foto" => $newName,
                "nama" => $request->nama,
                "alamat" => $request->alamat,
                "jabatan" => $request->jabatan,
                "whatsapp" => $request->whatsapp,
                "facebook" => $request->facebook,
                "instagram" => $request->instagram,
            ]);
            return response()->json(['success' => 'Berhasil menambahkan anggota BKM!']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function read()
    {
        $anggotas = AnggotaBkm::orderBy('id', 'desc')->get();
        return view('sekretaris.anggotas.data-bkm', compact('anggotas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = new ResourceAnggotaBkm(AnggotaBkm::findOrFail($id));
        return $anggota;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = AnggotaBkm::findOrFail($id);
        return view('sekretaris.anggotas.edit', compact('anggota'));
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
        $anggota = AnggotaBkm::findOrFail($id);
        $validator =  Validator::make($request->all(), [
            "nama" => 'required|max:60|min:3',
            "alamat" => 'required|max:250',
            "jabatan" => 'required|max:100',
            "whatsapp" => 'required',
        ]);

        if ($validator->passes()) {
            $fotoImg = $request->file('foto');
            if ($fotoImg == null) {
                $anggota->update([
                    "nama" => $request->nama,
                    "alamat" => $request->alamat,
                    "jabatan" => $request->jabatan,
                    "whatsapp" => $request->whatsapp,
                    "facebook" => $request->facebook,
                    "instagram" => $request->instagram,
                ]);
            } else {
                $newName = rand() . '-' . time() . '.' . $fotoImg->getClientOriginalExtension();
                $fotoImg->move(public_path('image/profile'), $newName);
                $anggota->update([
                    "foto" => $newName,
                    "nama" => $request->nama,
                    "alamat" => $request->alamat,
                    "jabatan" => $request->jabatan,
                    "whatsapp" => $request->whatsapp,
                    "facebook" => $request->facebook,
                    "instagram" => $request->instagram,
                ]);
            }
            return response()->json(['success' => 'Berhasil update anggota BKM!']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = AnggotaBkm::findOrFail($id);
        $anggota->delete();
        return response()->json(['success' => 'Berhasil hapus anggota BKM!']);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('bkm_anggotas')
                    ->where('nama', 'like', '%' . $query . '%')
                    ->orWhere('alamat', 'like', '%' . $query . '%')
                    ->orWhere('jabatan', 'like', '%' . $query . '%')
                    ->orderBy('id', 'desc')
                    ->get();
            } else {
                $data = DB::table('bkm_anggotas')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                $i = 1;
                foreach ($data as $row) {
                    $output .= "
                    <tr>
                        <td>" . $i++ . "</td>
                        <td><img src=" . url("image/profile/$row->foto") . " height='60' width='50'></td>
                        <td>" . $row->nama . "</td>
                        <td>" . $row->alamat . "</td>
                        <td>" . $row->jabatan . "</td>
                        <td>" . $row->whatsapp . "</td>
                        <td>" . $row->facebook . "</td>
                        <td>" . $row->instagram . "</td>
                        <td> 
                            <button onclick=detail(" . $row->id . ") class='btn btn-sm btn-primary ml-1 mb-1 shadow-sm' data-toggle='modal' data-target='#modalDetail'>
                                <i class='fas fa-info-circle fa-sm textk-50'></i>
                            </button>
                            <button onclick=edit(" . $row->id . ") class='btn btn-sm btn-primary ml-1 mb-1 shadow-sm'>
                                <i class='fas fa-edit fa-sm textk-50'></i>
                            </button>
                            <button onclick=hapus(" . $row->id . ") class='delete-bayar btn btn-sm btn-danger ml-1 shadow-sm'>
                                <i class='fas fa-trash fa-sm textk-50'></i>
                            </button>
                        </td>
                    </tr>
                    ";
                }
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="9">Data tidak ditemukan!</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
