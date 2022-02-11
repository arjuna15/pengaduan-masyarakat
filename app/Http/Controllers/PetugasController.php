<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function index()
    {
        $data = User::orderBy('created_at', 'DESC')->paginate(10);
        $aduan = Pengaduan::with('user')->orderBy('created_at', 'DESC')->paginate(10);
        return view('petugas.index', compact('data', 'aduan'));
    }

    public function masyarakat()
    {
        $data = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('petugas.masyarakat', compact('data'));
    }

    public function aduan(Request $req)
    {
        $data = Pengaduan::with('user')->orderBy('created_at', 'DESC')->get();
        return view('petugas.aduan', compact('data'));
    }

    public function detail(Request $req, $id)
    {
        // $t = DB::table('tanggapan')->where('id_pengaduan', $id)->get();
        $t= Tanggapan::where('id_pengaduan', $id)->get();
        $data = Pengaduan::with('user')->find($id);
        return view('petugas.aduanDetail', compact('data', 't'));
    }

    public function status(Request $req, $id)
    {
        $req->validate([
            'status' => 'required|in:PROSES,TERIMA,TOLAK'
        ]);

        $status = Pengaduan::find($id);
        $status->status = $req->status;
        $status->save();

        return back();
    }

    public function tanggapan(Request $req, $id)
    {
        // return $req;
        $id_pengaduan = $id;
        $tanggapan = new Tanggapan;
        $tanggapan->id_user = Auth()->user()->id;
        $tanggapan->tanggapan = $req->tanggapan;
        $tanggapan->id_pengaduan = $id_pengaduan;
        $tanggapan->save();

        return back();
    }
    public function formpengaduan()
    {
        $id = Auth()->user()->id;
        $data = DB::table('pengaduan')->where('id_user', $id)->get();
        return view('petugas.form-pengaduan', compact('data'));
    }

    public function pengaduan(Request $req)
    {
    //    return $req;
        // $req->validate([
        //     'id' => 'required',
        //     'id_user' => 'required',
        //     'judul' => 'required',
        //     'tanggal' => 'required',
        //     'isi' => 'required',
        //     'status' => 'required'
        // ]);

        $data = new Pengaduan;
        $data->id_user = Auth()->user()->id;
        $data->judul = $req->judul;
        $data->tanggal = $req->tanggal;
        $data->isi = $req->isi;
        $data->gambar = $req->file('gambar')->store('/asset/gambar', 'public');
        $data->status = "PROSES";
        $data->save();

        Alert::success('Terkirim!', 'Pengaduan berhasil dikirim, silahkan tunggu petugas untuk mersepon');
        return back();

    }
}

