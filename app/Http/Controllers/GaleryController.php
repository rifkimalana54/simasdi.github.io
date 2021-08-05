<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleryController extends Controller
{
    public function index()
    {
        $galerys = DB::table('galerys')->orderBy('id', 'desc')->paginate(10);
        return view('admin.doc.galery', compact('galerys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "gambar" => 'required|image|mimes:jpg,jpeg,png',
            "text" => 'required|max:80',
        ]);

        $fotoImg = $request->file('gambar');
        $newName = rand() . '-' . time() . '.' . $fotoImg->getClientOriginalExtension();
        $fotoImg->move(public_path('image/galery'), $newName);
        DB::table('galerys')->insert([
            "gambar" => $newName,
            "text" => $request->text,
            "created_at" => date('Y-m-d H:i:s'),
        ]);

        return redirect('/doc/galery')->with(['success' => "Berhasil menambah documentasi foto!"]);
    }

    public function destroy($id)
    {
        DB::table('galerys')->where('id', $id)->delete();
        return redirect('/doc/galery')->with(['success' => "Berhasil hapus foto!"]);
    }
}
