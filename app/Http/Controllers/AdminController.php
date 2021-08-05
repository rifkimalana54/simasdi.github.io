<?php

namespace App\Http\Controllers;

use App\Models\BayarKurban;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        // $skurbans = SohibulKurban::where('nama', 'like', "%" . $cari . "%")

        if (request()->user()->hasRole('admin')) {
            $bayars = BayarKurban::sum('bayar');
            return view('admin.dashboard', compact('bayars'));
        } else {
            return redirect('/');
        }
    }

    public function settings()
    {
        $data = Setting::first();

        return view('admin.settings.form', compact('data'));
    }

    public function updateApp(Request $request)
    {
        $data = Setting::first();
        $request->validate([
            "alamat" => "required|max:100",
            "email" => "required|max:30",
            "no_telepon" => "required|max:20",
            "twitter" => "required|max:50",
            "facebook" => "required|max:50",
            "instagram" => "required|max:50",
            "whatsapp" => "required|max:20",
            "visi" => "required|max:150",
            "misi" => "required|max:250",
            "judul1" => "required|max:100",
            "kotak1" => "required|max:150",
            "judul2" => "required|max:100",
            "kotak2" => "required|max:150",
            "judul3" => "required|max:100",
            "kotak3" => "required|max:150",
            "judul4" => "required|max:100",
            "kotak4" => "required|max:150",
        ]);
        $data->update([
            "alamat" => $request->alamat,
            "email" => $request->email,
            "no_telepon" => $request->no_telepon,
            "twitter" => $request->twitter,
            "facebook" => $request->facebook,
            "instagram" => $request->instagram,
            "whatsapp" => $request->whatsapp,
            "visi" => $request->visi,
            "misi" => $request->misi,
            "judul1" => $request->judul1,
            "kotak1" => $request->kotak1,
            "judul2" => $request->judul2,
            "kotak2" => $request->kotak2,
            "judul3" => $request->judul3,
            "kotak3" => $request->kotak3,
            "judul4" => $request->judul4,
            "kotak4" => $request->kotak4,
        ]);
        return redirect('/setting-app')->with(['success' => 'Berhasil update aplikasi!']);
    }

    public function homeMessage()
    {
        return view('admin.messages.index');
    }

    public function allMessage()
    {
        $notify = Message::orderBy('id', 'desc')->take(20)->get();
        return view('admin.messages.data-messages', compact('notify'));
    }

    public function readyMessage($id)
    {
        $dataDetail = Message::findOrFail($id);
        $this->alreadyRead($id);
        return view('admin.messages.msg-detail', compact('dataDetail'));
    }

    private function alreadyRead($msg)
    {
        $updateMsg = Message::findOrFail($msg);
        $updateMsg->update([
            'see' => 1,
        ]);
    }
}
