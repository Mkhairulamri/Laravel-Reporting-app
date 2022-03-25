<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Hash;
use Auth;

class user extends Controller
{
    public function index(){
        $menu = 1;
        return view('user/index' ,['menu'=>$menu]);
    }
    public function lapor_kerusakan(){
        $menu = 3;
        $data = DB::table('data_kerusakans')
                ->where('data_kerusakans.user',$user = Auth::user()->id)
                ->join('kategori_kerusakans','data_kerusakans.kerusakan','=','kategori_kerusakans.id')
                ->join('users','data_kerusakans.user','=','users.id')
                ->select('data_kerusakans.*','users.name','kategori_kerusakans.kategori_kerusakan')
                ->orderby('tanggal_laporan','DESC')
                ->get();

                // dd($data);
        return view('user/data_laporan' ,['menu'=>$menu,'data'=>$data]);
    }

    public function form_lapor(){
        $menu =3;
        $opsi = DB::table('kategori_kerusakans')->get();

        return view('user/form-laporan' , ['menu'=>$menu,'opsi'=>$opsi]);
    }

    public function simpan_laporan(Request $request){
        dd($request->all());
    }
    public function profil(){
        $menu = 2;
        return view('user/profil' ,['menu'=>$menu]);
    }
    public function simpan_update(Request $request){
        if($request->password_baru == null){
            $update = DB::table('users')->where('id',$request->id)->update([
                'name'=> $request->nama,
                'email'=>$request->email,
                'no_hp'=>$request->no_hp,
            ]);
            
            if($update){
                Session::flash('sukses','Data Berhasi Di Update');
            }else{
                Session::flash('gagal','Data Gagal Di Update');
            }
            return redirect()->route('profil.user');
        }else{
            $update = DB::table('users')->where('id',$request->id)->update([
                'name'=> $request->nama,
                'email'=>$request->email,
                'no_hp'=>$request->no_hp,
                'password'=> Hash::make($request->password_baru)
            ]);
            
            if($update){
                Session::flash('sukses','Data Berhasi Di Update');
            }else{
                Session::flash('gagal','Data Gagal Di Update');
            }
            return redirect()->route('profil.user');
        }
    }
    public function simpan_kerusakan(Request $request){
        $this->validate($request, [
            'foto' => 'required',
            'foto.*' => 'mimes:jpeg,png,jpg,gif,svg'
            ]);
        if($request->hasfile('foto')){
            foreach($request->file('foto') as $file)
            {
                $name = time().'.'.$file->getClientOriginalName();
                $file->move(public_path('images'), $name);  
                $data[] = $name;  
            }
        }
        $query = DB::table('data_kerusakans')->insert([
            'tanggal_laporan'=> date('Y-m-d'),
            'kerusakan'=>$request->kategori,
            'detail_kerusakan'=>$request->detail,
            'lokasi'=>$request->lokasi,
            'foto_kerusakan'=>JSON_Encode($data),
            'user'=>$request->id_user,
            'status'=>0
        ]);
        if($query){
            Session::flash('sukses','Laporan Berhasil Di Tambah');
        }else{
            Session::flash('gagal','Laporan Gagal Di Tambah');
        }
        return redirect()->route('lapor.kerusakan');
    }

    //fungsi lihat laporan kerusakan
    public function lihat($id){
        $data = DB::table('data_kerusakans')
                ->where('data_kerusakans.id',$id)
                // ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->join('users','data_kerusakans.user','=','users.id')
                ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->select('data_kerusakans.*','users.name','kategori_kerusakans.kategori_kerusakan')
                ->get();
        $menu = 3;
        // dd($data);
        return view('user/lihat_laporan',['data'=>$data, 'menu'=>$menu]);
    }

    //fungsi hapus laporan
    public function hapus_laporan($id){
       
        $query = DB::table('data_kerusakans')->where('id',$id)->delete();

        if($query){
            Session::flash('sukses','Laporan Berhasil Dihapus');
        }else{
            Session::flash('gagal','Laporan Gagal Dihapus');
        }
        return redirect()->route('lapor.kerusakan');
    }

    //fungsi ubah laporan
    public function ubah_laporan($id){
        $data = DB::table('data_kerusakans')
                ->where('data_kerusakans.id',$id)
                // ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->join('users','data_kerusakans.user','=','users.id')
                ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->select('data_kerusakans.*','users.name','kategori_kerusakans.kategori_kerusakan')
                ->get();
        $opsi = DB::table('kategori_kerusakans')->get();
        $menu = 3;
        // dd($opsi);
        return view('user/ubah_laporan',['data'=>$data, 'menu'=>$menu,'opsi'=>$opsi]);
    }

    
}