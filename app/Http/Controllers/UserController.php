<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Auth;
use Alert;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
      return view('login.login');
   }

   public function proses_masuk(Request $req)
   {
      $data = [
         'email' => $req->input('email'),
         'password' => $req->input('password')
      ];

      Auth::attempt($data);

      if(Auth()->user()->role == "admin"){
         Alert::success('Success Title', 'Success Message');
         return redirect('/admin');
      }elseif(Auth()->user()->role == "user"){
        return redirect('/masyarakat');
      }elseif(Auth()->user()->role == "petugas"){
         return redirect('/petugas');
      }else{
         echo "Username atau password salah";
      }


   }

   public function registrasi()
   {
       return view('login.registrasi');
   }

   public function proses_registrasi(Request $req)
   {
      
      // $req->validate([
      //    'nama' => 'required',
      //    'email' => 'required|email',
      //    'password' => 'required|min:6|confirmed',
      //    'telp' => 'required',
      //    'alamat' => 'required',
      //    'role' => 'required'
      // ]);

      // return $req;
      $user = new User;
      $user->nama = $req->nama;
      $user->email = $req->email;
      $user->password = bcrypt($req->password);
      $user->telp = $req->telp;
      $user->alamat = $req->alamat;
      $user->role = "user";
      $user->save();
      // dd($user);
      Alert::success('Berhasil', 'Registrasi Berhasil');
      return redirect('/masuk');

   }

   public function keluar()
   {
      Auth::logout();
      return redirect('/');
   }


}
