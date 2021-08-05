<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\BayarKurban;
use Illuminate\Http\Request;

class SekretarisController extends Controller
{
    public function index()
    {
        if (request()->user()->hasRole('sekretaris')) {
            $bayars = BayarKurban::sum('bayar');
            return view('sekretaris.dashboard', compact('bayars'));
        } else {
            return redirect('/');
        }
    }

    public function homeMessage()
    {
        return view('sekretaris.messages.index');
    }

    public function allMessage()
    {
        $notify = Message::orderBy('id', 'desc')->take(20)->get();
        return view('sekretaris.messages.data-messages', compact('notify'));
    }

    public function readyMessage($id)
    {
        $dataDetail = Message::findOrFail($id);
        $this->alreadyRead($id);
        return view('sekretaris.messages.msg-detail', compact('dataDetail'));
    }

    private function alreadyRead($msg)
    {
        $updateMsg = Message::findOrFail($msg);
        $updateMsg->update([
            'see' => 1,
        ]);
    }
}
