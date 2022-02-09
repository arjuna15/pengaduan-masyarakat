<?php

namespace App\Http\Controllers;
use Auth;
// use RealRashid\SweetAlert\Facades\Alert;
use File;
use Alert;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasyarakatController extends Controller
{

    public function index()
    {
        $id = Auth()->user()->id;
        $data = DB::table('pengaduan')->where('id_user', $id)->get();
        return view('masyarakat.index', compact('data'));
    }
    public function listpengaduan()
    {
        $id = Auth()->user()->id;
        $data = DB::table('pengaduan')->where('id_user', $id)->get();
        return view('masyarakat.list-pengaduan', compact('data'));
    }

    public function formpengaduan()
    {
        $id = Auth()->user()->id;
        $data = DB::table('pengaduan')->where('id_user', $id)->get();
        return view('masyarakat.form-pengaduan', compact('data'));
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

    public function show($id)
    {
        $t = DB::table('tanggapan')->where('id_pengaduan', $id)->get();
        $data = Pengaduan::find($id);
        return view('masyarakat.detail', compact('data', 't'));
    }
    
}
