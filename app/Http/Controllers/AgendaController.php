<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Agenda;
use Validator;
use Dompdf\Dompdf;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.agenda.agenda');
    }

    public function data()
    {
        $agendas = Agenda::orderBy('id', 'desc')->take(10)->get();
        return view('admin.agenda.data', compact('agendas'));
    }


    public function getAgenda($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('admin.agenda.agenda-cetak', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.agenda.agenda-create');
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
            "title" => 'required|max:60|min:5',
            "deskripsi" => 'required|min:10|max:250',
            "tgl_pelaksanaan" => 'required|date',
            "jam" => 'required',
            "tempat" => 'required',
        ]);

        if ($validator->passes()) {
            $user->agenda()->create([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
                'jam' => $request->jam,
                'tempat' => $request->tempat
            ]);
            return response()->json(['success' => 'Berhasil membuat agenda!']);
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('admin.agenda.agenda-detail', compact('agenda'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);
        $validator = Validator::make($request->all(), [
            "title" => 'required|max:60|min:5',
            "deskripsi" => 'required|min:10|max:250',
            "tgl_pelaksanaan" => 'required|date',
            "jam" => 'required',
            "tempat" => 'required',
        ]);

        if ($validator->passes()) {
            $agenda->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
                'jam' => $request->jam,
                'tempat' => $request->tempat
            ]);
            return response()->json(['success' => 'Berhasil Edit Agenda!']);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function readDetail($id)
    {
        $agenda = Agenda::find($id);
        return view('admin.agenda.data-detail', compact('agenda'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::find($id);

        $agenda->delete();

        return redirect('/agenda')->with(['success' => 'Agenda dengan judul "' . $agenda->title . '" berhasil di hapus!']);
    }
}
