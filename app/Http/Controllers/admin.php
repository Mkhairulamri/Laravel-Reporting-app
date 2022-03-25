<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Hash;
use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use App\data_kerusakan;
use Illuminate\Support\Facades\Crypt;
use PDF;

class admin extends Controller
{

    //fungsi index
    public function index(){
        $menu = 1;
        $data = DB::table('data_kerusakans')
                ->select(\DB::raw("COUNT(*) as count"))
                ->whereYear('tanggal_laporan', date('Y'))
                ->groupBy(\DB::raw("Month(tanggal_laporan)"))
                ->pluck('count');
        
        $tahun = date('Y');
        // dd($data);
        return view('admin/index',['menu'=>$menu,'data'=>$data,'tahun'=>$tahun]);
    }
    public function lalu(){
        $menu = 1;
        $tahun = date('Y')-1;
        $data = DB::table('data_kerusakans')
                ->select(\DB::raw("COUNT(*) as count"))
                ->whereYear('tanggal_laporan', $tahun)
                ->groupBy(\DB::raw("Month(tanggal_laporan)"))
                ->pluck('count');
        
       
        return view('admin/index_perhari',['menu'=>$menu,'data'=>$data,'tahun'=>$tahun]);
    }

    //fungsi profil
    public function profil(){
        $menu= 2;
        $data = DB::table('users')->where('akses',1)->get();

        return view('admin/profil',['menu'=>$menu,'data'=>$data]);
    }

    //fungsi update Profil
    public function updateprofil(Request $request){
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
            return redirect()->route('profil.admin');
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
            return redirect()->route('profil.admin');
        }
        
    }
    //fungsi tampil data user
    public function show_data(){
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

    //fungsi edit data user
    public function edit(Request $request, $id){
        $update = DB::table('users')->where('id',$id)->update([
            'name'=> $request->nama,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'unit_kerja'=> $request->staf
        ]);
        
        if($update){
            Session::flash('sukses','Data Berhasi Di Edit');
        }else{
            Session::flash('gagal','Data Gagal Di Edit');
        }
        return redirect('admin/user');
    }

    //fungsi simpan data user
    public function simpan(Request $request){
        $query= DB::table('users')->insert([
            'name'=> $request->nama,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'unit_kerja'=> $request->staf,
            'password'=> Hash::make(12345678),
            'akses'=> 0
        ]);

        if($query){
            Session::flash('sukses','Data Berhasi Di simpan');
        }else{
            Session::flash('gagal','Data Gagal Di Simpan');
        }
        return redirect('admin/user');
    }

    //fungsi hapus data user
    public function hapus($id){
        $query = DB::table('users')->where('id',$id)->delete();
        if($query){
            Session::flash('hapus_sukses','Data Berhasi Di Hapus');
        }else{
            Session::flash('hapus_gagal','Data Gagal Di Hapus');
        }
        return redirect('admin/user');
    }

    //fungsi reset password user
    public function reset($id){
        $update = DB::table('users')->where('id',$id)->update([
            'password'=> Hash::make(12345678)
        ]);
        
        if($update){
            Session::flash('sukses','Password Berasil Di Reset');
        }else{
            Session::flash('gagal','Password Gagal Di Reset');
        }
        return redirect('admin/user');
    }

    //fungsi tampil data kategori
    public function kategori_kerusakan(){
        $menu = 4;
        $jumlah_listrik = DB::table('data_kerusakans')->where('kerusakan',5)->count();
        $jumlah_gedung = DB::table('data_kerusakans')->where('kerusakan',6)->count();
        $listrik_diterima = DB::table('data_kerusakans')->where('kerusakan',5)->where('status',1)->count();
        $listrik_ditolak = DB::table('data_kerusakans')->where('kerusakan',5)->where('status',2)->count();
        $listrik_verifikasi = DB::table('data_kerusakans')->where('kerusakan',5)->where('status',0)->count();
        $gedung_diterima = DB::table('data_kerusakans')->where('kerusakan',6)->where('status',1)->count();
        $gedung_ditolak = DB::table('data_kerusakans')->where('kerusakan',6)->where('status',2)->count();
        $gedung_verifikasi = DB::table('data_kerusakans')->where('kerusakan',6)->where('status',0)->count();

        $jumlah = DB::table('data_kerusakans')
                    ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                    ->get();
                    
        $value = $jumlah->groupby('kerusakan');

        $kat_ker = DB::table('kategori_kerusakans')->get();
        $d = array();
        foreach($kat_ker as $key => $v){
            $d[$key]['id']= $v->id;
            $d[$key]['kategori'] = $v;
            $d[$key]['diverifikasi'] = DB::table('data_kerusakans')->where('kerusakan',$v->id)->where('status',0)->count();
            $d[$key]['diterima'] = DB::table('data_kerusakans')->where('kerusakan',$v->id)->where('status',1)->count();
            $d[$key]['ditolak'] = DB::table('data_kerusakans')->where('kerusakan',$v->id)->where('status',2)->count();
            $d[$key]['jumlah'] = $d[$key]['diverifikasi']+$d[$key]['diterima']+$d[$key]['ditolak'];
            
        }

        $value = $d;

        return view('admin/kategori_kerusakan',[
            'menu'=>$menu,
            'value' => $value
            ]);    
    }

    //fungsi simpan kategori Kerusakan    
    public function simpan_kategori(Request $request){
        $query= DB::table('kategori_kerusakans')->insert([
            'kategori_kerusakan'=> $request->nama
        ]);
        if($query){
            Session::flash('sukses','Kategori Berhasi Di Tambah');
        }else{
            Session::flash('gagal','Kategori Gagal Di Simpan');
        }
        return redirect ('admin/kategori-kerusakan');
    }

    //fungsi hapus kategori kerusakan
    public function hapus_kategori($id){
        $query = DB::table('kategori_kerusakans')->where('id',$id)->delete();

        if($query){
            Session::flash('hapus_sukses','Kategori Berhasil Di Hapus');
        }else{
            Session::flash('hapus_gagal','Kategori Gagal Di hapus');
        }
        return redirect('admin/kategori-kerusakan');
    }

    //fungsi update kategori
    public function update(Request $request){
        $query = DB::table('kategori_kerusakans')->where('id',$request->id)->update([
            'kategori_kerusakan' => $request->nama
        ]);
        if($query){
            Session::flash('sukses','Kategoi Berhasil Di Update');
        }else{
            Session::flash('gagal','Kategoi Berhasil Di Update');
        }
        return redirect()->route('kategori');
    }

    //fungsi tampil data kerusakan
    public function data_kerusakan(){
        $data = DB::table('data_kerusakans')
                // ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->join('users','data_kerusakans.user','=','users.id')
                ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->select('data_kerusakans.*','users.name','kategori_kerusakans.kategori_kerusakan')
                ->orderby('tanggal_laporan','DESC')
                ->get();
        $menu = 5;

    
       return view('admin/data-kerusakan',['data'=>$data, 'menu'=>$menu]);
    }
    
    //fungsi verifikasi data kerusakan
    public function data_kerusakans(Request $request){
        $data = DB::table('data_kerusakans')
                ->where('data_kerusakans.id',$request->id)
                // ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->join('users','data_kerusakans.user','=','users.id')
                ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->get();
        $menu = 5;
    
    
       return view('admin/verifikasi',['data'=>$data, 'menu'=>$menu]);
    }

    //fungsi laporan kerusakan
    public function laporan_kerusakan(){
        $data = DB::table('data_kerusakans')
                // ->join('kategori_kerusakans','data_kerusakans.kerusakan','=','kategori_kerusakans.id')
                ->join('users','data_kerusakans.user','=','users.id')
                ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->where('data_kerusakans.status',3)
                ->orderby('tanggal_laporan','DESC')
                ->get();
        $menu = 6;
        
    
       return view('admin/laporan-kerusakan',['data'=>$data, 'menu'=>$menu]);
    }
    //  fungsi show halaman verifikasi
    public function verifikasi($id){
        $data = DB::table('data_kerusakans')
                ->where('data_kerusakans.id',$id)
                // ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->join('users','data_kerusakans.user','=','users.id')
                ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->select('data_kerusakans.*','users.name','kategori_kerusakans.kategori_kerusakan')
                ->get();
        $menu = 5;
        return view('admin/verifikasi',['data'=>$data, 'menu'=>$menu]);
    }

    //fungsi verifikasi diterima
    public function diterima($id){
       
        $query = DB::table('data_kerusakans')->where('id',$id)->update([
            'status' => 1
        ]);
        if($query){
            Session::flash('sukses','Laporan Berhasil Diverifikasi');
        }

        return redirect()->route('data.laporan');
    }

    //fungsi verifikasi ditolak
    public function ditolak($id){
        $query = DB::table('data_kerusakans')->where('id',$id)->update([
            'status' => 2
        ]);
        if($query){
            Session::flash('sukses','Laporan Berhasil Diverifikasi');
        }

        return redirect()->route('data.laporan');
    }
    //fungsi verifikasi ditolak
    public function selesai($id){
        $query = DB::table('data_kerusakans')->where('id',$id)->update([
            'status' => 3
        ]);
        if($query){
            Session::flash('sukses','Laporan Berhasil Diterima dan Laporan Selesai');
        }

        return redirect()->route('data.laporan');
    }

    //fungsi cetak laporan
    public function cetak(Request $request){

        $data = DB::table('data_kerusakans')
                ->join('users','data_kerusakans.user','=','users.id')
                ->join('kategori_kerusakans','kategori_kerusakans.id','=','data_kerusakans.kerusakan')
                ->select('data_kerusakans.*','users.name','users.unit_kerja','kategori_kerusakans.kategori_kerusakan')
                ->orderby('tanggal_laporan','asc')
                ->where('data_kerusakans.status',3)
                ->whereYear('tanggal_laporan','=',$request->Tahun)
                ->wheremonth('tanggal_laporan', $request->bulan)
                ->get();

                $bulan = $request->bulan;
                $nama= null;
                if($bulan==1){
                  $nama= "Januari";
                }elseif ($bulan==2) {
                  $nama = "Februari";
                }elseif ($bulan==3) {
                  $nama = "Maret";
                }elseif ($bulan==4) {
                  $nama = "April";
                }elseif ($bulan==5) {
                  $nama = "Mei";
                }elseif ($bulan==6) {
                  $nama = "Juni";
                }elseif ($bulan==7) {
                  $nama = "Juli";
                }elseif ($bulan==8) {
                  $nama = "Agustus";
                }elseif ($bulan==9) {
                  $nama = "September";
                }elseif ($bulan==10) {
                  $nama = "Oktober";
                }elseif ($bulan==11) {
                  $nama = "November";
                }elseif ($bulan==12) {
                  $nama = "Desember";
                }else{
                  $nama = "Tidak Diketahui";
                }

                // return view('admin/cetak_laporan',['data'=>$data,'bulan'=>$nama,'tahun'=>$request->Tahun]);
        $pdf = PDF::loadview('admin/cetak_laporan',['data'=>$data,'bulan'=>$nama,'tahun'=>$request->Tahun])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    
}
