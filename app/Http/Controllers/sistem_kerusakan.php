<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;
use Validator;
use Hash;
use Session;
use App\User;

use Illuminate\Support\Facades\Crypt;

class sistem_kerusakan extends Controller
{
    //login
    public function index(){
        
        return view('login');
    }

    public function reset(){
        return view('reset-password');
    }

    public function login(Request $request){
        
        if(Auth::attempt($request->only('email','password'))){
            if(Auth::user()->akses == 1){
                return redirect()->route('admin');
            }elseif(Auth::user()->akses == 0){
                return redirect()->route('user');
            }else{
                return redirect('/');
            }
        }
        Session::flash('error', 'Email atau Password salah');
        return redirect()->route('index');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function coba($id){
            $no =1;
            $menu = 3;
            $data = DB::table('users')
                    ->where('akses',0)
                    ->get();
            $massage=3;
            return view('admin/showdata',[
                'menu'=>$menu,
                'data'=>$data,
                'no'=>$no,
                'massage'=>$massage
                ]);
    }
    public function simpan_update(Request $request){
        if($request->foto == null){
            $update = DB::table('data_kerusakans')->where('id',$request->id)->update([
                'kerusakan'=> $request->kategori,
                'detail_kerusakan'=>$request->detail,
                'lokasi'=>$request->lokasi,
            ]);
            
            if($update){
                Session::flash('sukses','Data Berhasi Di Update');
            }else{
                Session::flash('gagal','Data Gagal Di Update');
            }
            return redirect()->route('lapor.kerusakan');
        }else{
            if($request->hasfile('foto')){
                foreach($request->file('foto') as $file)
                {
                    $name = time().'.'.$file->getClientOriginalName();
                    $file->move(public_path('images'), $name);  
                    $data[] = $name;  
                }
            }
            $query = DB::table('data_kerusakans')->where('id',$request->id)->update([
                'kerusakan'=>$request->kategori,
                'detail_kerusakan'=>$request->detail,
                'lokasi'=>$request->lokasi,
                'foto_kerusakan'=>JSON_Encode($data),
            ]);
            if($query){
                Session::flash('sukses','Laporan Berhasil Di Update');
            }else{
                Session::flash('gagal','Laporan Gagal Di Update');
            }
            return redirect()->route('lapor.kerusakan');
        }
    }
}
