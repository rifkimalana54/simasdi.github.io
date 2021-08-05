<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Laporan;
use App\Models\SohibulKurban;
use Illuminate\Support\Facades\Http;
use App\Models\AnggotaBkm;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Http\Resources\Agenda as ResourcesAgenda;
use App\Http\Resources\Galery as ResourcesGalery;

class HalamanController extends Controller
{
    //Halaman Waktu Sholat
    public function getWaktuSholat()
    {
        $response = Http::get('https://api.pray.zone/v2/times/this_month.json?city=cirebon');
        $wsholats = $response->json();
        return view('home.waktusholat', compact('wsholats'));
    }

    //Halaman Agenda
    public function getAgenda()
    {
        $agendas = Agenda::orderBy('id', 'desc')->paginate(3);
        return view('home.agenda.agenda', compact('agendas'));
    }

    public function getIdAgenda($id)
    {
        $agenda = new ResourcesAgenda(Agenda::findOrFail($id));

        return $agenda;
    }

    /** Halaman Laporan **/
    public function laporan()
    {
        $laporans = Laporan::orderBy('id', 'desc')->paginate(3);
        $seluruh_pemasukan = Laporan::sum('pemasukan');
        $seluruh_pengeluaran = Laporan::sum('pengeluaran');
        return view('home.laporans.index', compact('laporans', 'seluruh_pemasukan', 'seluruh_pengeluaran'));
    }


    /** Halaman Sohibul Kurban **/
    public function sohibulKurban(Request $request)
    {
        $cari = $request->cari;

        $skurbans = SohibulKurban::orderBy('type_hewan_id', 'desc')->get();

        return view('home.kurbans.kurban', compact('skurbans', 'cari'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = SohibulKurban::with('type_hewans')->where('nama', 'like', '%' . $query . '%')
                    ->orWhere('alamat', 'like', '%' . $query . '%')
                    ->orderBy('type_hewan_id', 'desc')
                    ->get();
            } else {
                $data = SohibulKurban::with('type_hewans')
                    ->orderBy('type_hewan_id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                $i = 1;
                foreach ($data as $row) {
                    $output .= "
                    <tr>
                        <td>" . $i++ . "</td>
                        <td>" . $row->nama . "</td>
                        <td>" . $row->alamat . "</td>
                        <td>" . $row->type_hewans->type . "</td>
                        <td>" . $row->type_hewans->harga . "</td>
                        <td class='text-center'> 
                            <a href='/daftar-sohibul-kurban/" . $row->id . "'><b>&raquo;</b></a>
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

    public function sohibulKurbanDetail($id)
    {
        $bayars = Sohibulkurban::with('bayars', 'type_hewans')->findOrFail($id);
        return view('home.kurbans.kurban-detail', compact('bayars'));
    }

    public function bkmAnggotas()
    {
        $bkm_anggotas = AnggotaBkm::orderBy('id', 'asc')->paginate(4);
        return view('home.anggotas.anggota-bkm', compact('bkm_anggotas'));
    }

    public function searchBkm(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = AnggotaBkm::with('user')->where('nama', 'like', '%' . $query . '%')
                    ->orWhere('alamat', 'like', '%' . $query . '%')
                    ->orderBy('id', 'asc')
                    ->get();
            } else {
                $data = AnggotaBkm::with('user')
                    ->orderBy('id', 'asc')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $bkm) {
                    $output .= '
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <div class="member-img">
                                    <img src="' . url("image/profile/" . $bkm->foto) . '" width="100%" height="250" alt="">
                                    <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>' . $bkm->nama . '</h4>
                                    <span>' . $bkm->jabatan . '</span>
                                </div>
                            </div>
                        </div>
                    ';
                }
            } else {
                $output = '
                <div class="text-center">
                    Tidak ada data BKM!
                </div>
                ';
            }
            $data = array(
                'data_bkm'  => $output,
            );

            echo json_encode($data);
        }
    }

    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama" => 'required|max:100|min:3',
            "email" => 'required',
            "subject" => 'required|max:30',
            "text" => 'required|min:5|max:600',
        ]);
        if ($validator->passes()) {
            Message::create([
                "nama" => $request->nama,
                "email" => $request->email,
                "subject" => $request->subject,
                "text" => $request->text,
                "message" => 'Mendapat pesan baru!'
            ]);
            return response()->json(['success' => 'Pesan Berhasil terkirim!']);
        } else {
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function notifyCount()
    {
        $count = Message::where('see', 0)->count();
        return ['total' => $count];
    }

    public function apiQuran()
    {
        $response = Http::get('https://al-quran-8d642.firebaseio.com/data.json?print=pretty');
        $data = $response->json();
        return view('home.qurans.baca-quran', compact('data'));
        // dd($data);
    }

    public function isiSurah($no_surah, $surah, $ayat)
    {
        $response = Http::get('https://al-quran-8d642.firebaseio.com/surat/' . $no_surah . '.json?print=pretty');
        $data = $response->json();
        $nama_surah = $surah;
        $count_ayat = $ayat;
        return view('home.qurans.isi-surah', compact('data', 'nama_surah', 'count_ayat'));
        // dd($data);
    }

    public function galerys()
    {
        $galerys = DB::table('galerys')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();
        return view('home.docs.galery', compact('galerys'));
    }

    public function loadmore($time)
    {
        $galerys = DB::table('galerys')
            ->orderBy('id', 'desc')
            ->where('created_at', '<', date('Y-m-d H:i:s', $time))
            ->take(4)
            ->get();
        return ['galerys' => ResourcesGalery::collection($galerys)];
    }
}
