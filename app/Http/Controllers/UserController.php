<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lokasi;
use App\Models\Tongkang;
use App\Models\Kayu;
use App\Models\Driver;
use App\Models\UnitAlat;
use App\Models\Chainsaw;
use App\Models\Kupas;
use App\Models\HelperMstr;
use App\Models\Keperluan;
use App\Models\PeriodeOperasional;
use App\Models\TrHeaderTpn;
use App\Models\TrDetailTpn;
use App\Models\TrHeaderTpnOut;
use App\Models\TrHistory;
use App\Models\TrDetailPosition;
use App\Exports\UserExport;
use App\Exports\UserExport_1;
use App\Exports\UserExport_1_1;
use App\Exports\UserExport_2;
use App\Exports\UserExport_3;
use App\Exports\UserExport_4;
use App\Exports\UserExport_4_detail;
use App\Exports\UserExport_5;
use App\Exports\UserExport_5_industri;
use App\Exports\UserExport_6;
use App\Exports\UserExport_7;
use App\Exports\UserExport_8;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\Helper;
use Carbon\Carbon;
use Session;


class UserController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect('home');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function home()
    {        

        if (Auth::check()) {

            $dataLogg = \Helper::dataLogg('002');
            $dataLogg2 = \Helper::dataLogg2('601');
            $dataLogg3 = \Helper::dataLogg2('710');
            $dataLogg4 = \Helper::dataLogg2('711');
            $dataLogg5 = \Helper::dataLogg2('720');
            $dataLogg6 = \Helper::dataLogg2('730');
            $dataLogg7 = \Helper::dataLogg2('731');
            $dataLogg8 = \Helper::dataLogg2('740');
            $data['title'] = 'Home';
            return view('home', $data, compact('dataLogg','dataLogg2','dataLogg3','dataLogg4','dataLogg5','dataLogg6','dataLogg7','dataLogg8'));
        }else{
            return redirect('login');
        }
    }

    public function register()
    {
        $data['title'] = '';
        return view('user/register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }

    public function users()
    {
        $user =  User::all();

        $data['title'] = 'Register User';
        return view('master/users', $data, compact('user'));
    }

    public function users_add(Request $request)
    {
        // echo $request;
        // exit();
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'level' => 'required',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);
        $user->save();

        return redirect()->route('users')->with('success', 'Tambah data sukses!');
    }

    public function profile()
    {
        $user =  User::all();

        $data['title'] = 'Profile';
        return view('master/profile', $data, compact('user'));
    }

    public function profile_edit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo_img.*' => 'mimes:jpg,jpeg,png|max:2000',
        ]);

        if ($request->hasfile('photo_img')) {

            $image_path = public_path() . "/photos/".Auth::user()->photo_img; 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $photo_img = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('photo_img')->getClientOriginalName());
            $request->file('photo_img')->move(public_path('photos'), $photo_img);
            if($request->password != '')
            {
                User::where('username', Auth::user()->username)
                      ->update(['name' => $request->name,
                                'password' => Hash::make($request->password),
                                'level' => $request->level,
                                'photo_img' => $photo_img,
                                'updated_at' => date('Y-m-d H:i:s'),
                                    ]);      
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/');
            }else{
                User::where('username', Auth::user()->username)
                  ->update(['name' => $request->name,
                            'level' => $request->level,                            
                            'photo_img' => $photo_img,
                            'updated_at' => date('Y-m-d H:i:s'),
                                ]);      
            return redirect()->route('profile')->with('success', 'Ubah data sukses!');    
            }
        }else{
            if($request->password != '')
            {
                User::where('username', Auth::user()->username)
                      ->update(['name' => $request->name,
                                'password' => Hash::make($request->password),
                                'level' => $request->level, 
                                'updated_at' => date('Y-m-d H:i:s'),
                                    ]);      
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/');
            }else{
                User::where('username', Auth::user()->username)
                      ->update(['name' => $request->name,
                                'level' => $request->level, 
                                'updated_at' => date('Y-m-d H:i:s'),
                                    ]);      
                return redirect()->route('profile')->with('success', 'Ubah data sukses!');
            }
        }
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function lokasi()
    {
        $lokasi =  Lokasi::all();

        $data['title'] = 'Master Lokasi';
        return view('master/lokasi', $data, compact('lokasi'));
    }

    public function lokasi_add(Request $request)
    {
        $request->validate([
            'kode_lokasi' => 'required|unique:mstr_lokasi',
            'nama_lokasi' => 'required',
        ]);

        $lokasi = new Lokasi([
            'kode_lokasi' => $request->kode_lokasi,
            'nama_lokasi' => $request->nama_lokasi,
        ]);
        $lokasi->save();        
        return redirect()->route('lokasi')->with('success', 'Tambah data sukses!');
    }    

    public function tongkang()
    {
        $tongkang =  Tongkang::all();

        $data['title'] = 'Master Tongkang';
        return view('master/tongkang', $data, compact('tongkang'));
    }

    public function tongkang_add(Request $request)
    {
        $request->validate([
            'kode_tongkang' => 'required|unique:mstr_tongkang',
            'nama_tongkang' => 'required',
        ]);

        $tongkang = new Tongkang([
            'kode_tongkang' => $request->kode_tongkang,
            'nama_tongkang' => $request->nama_tongkang,
        ]);
        $tongkang->save();        
        return redirect()->route('tongkang')->with('success', 'Tambah data sukses!');
    }

    public function kayu()
    {
        $kayu =  Kayu::all();

        $data['title'] = 'Master Kayu';
        return view('master/kayu', $data, compact('kayu'));
    }

    public function kayu_add(Request $request)
    {
        $request->validate([
            'kode_kayu' => 'required|unique:mstr_kayu',
            'nama_kayu' => 'required',
            's_kayu' => 'required',
        ]);

        $kayu = new Kayu([
            'kode_kayu' => $request->kode_kayu,
            'nama_kayu' => $request->nama_kayu,
            's_kayu' => $request->s_kayu,
        ]);
        $kayu->save();        
        return redirect()->route('kayu')->with('success', 'Tambah data sukses!');
    }

    public function driver()
    {
        $driver =  Driver::all();

        $data['title'] = 'Master Driver';
        return view('master/driver', $data, compact('driver'));
    }

    public function driver_add(Request $request)
    {
        $request->validate([
            'kode_driver' => 'required|unique:mstr_driver',
            'nama_driver' => 'required',
            'kode_alat_d' => '',
        ]);

        $driver = new Driver([
            'kode_driver' => $request->kode_driver,
            'nama_driver' => $request->nama_driver,
            'kode_alat_d' => $request->kode_alat_d,
        ]);
        $driver->save();
        return redirect()->route('driver')->with('success', 'Tambah data sukses!');
    }

    public function unitAlat()
    {
        $unitAlat = UnitAlat::all();

        $data['title'] = 'Master Unit Alat';
        return view('master/unitAlat', $data, compact('unitAlat'));
    }

    public function unitAlat_add(Request $request)
    {
        $request->validate([
            'kode_unit_a' => 'required|unique:mstr_unit_alat',
            'nomor_pintu' => '',
            'merk_unit_a' => '',
        ]);

        $unitAlat = new UnitAlat([
            'kode_unit_a' => $request->kode_unit_a,
            'nomor_pintu' => $request->nomor_pintu,
            'merk_unit_a' => $request->merk_unit_a,
        ]);
        $unitAlat->save();
        return redirect()->route('unitAlat')->with('success', 'Tambah data sukses!');
    }

    public function chainsaw()
    {
        $chainsaw = Chainsaw::all();

        $data['title'] = 'Master Chainsaw';
        return view('master/chainsaw', $data, compact('chainsaw'));
    }

    public function chainsaw_add(Request $request)
    {
        $request->validate([
            'kode_chainsaw' => 'required|unique:mstr_chainsaw',
            'nama_chainsaw' => '',
        ]);

        $chainsaw = new Chainsaw([
            'kode_chainsaw' => $request->kode_chainsaw,
            'nama_chainsaw' => $request->nama_chainsaw,
        ]);
        $chainsaw->save();
        return redirect()->route('chainsaw')->with('success', 'Tambah data sukses!');
    }

    public function kupas()
    {
        $kupas = Kupas::all();

        $data['title'] = 'Master Kupas';
        return view('master/kupas', $data, compact('kupas'));
    }

    public function kupas_add(Request $request)
    {
        $request->validate([
            'kode_kupas' => 'required|unique:mstr_kupas',
            'nama_kupas' => '',
        ]);

        $kupas = new Kupas([
            'kode_kupas' => $request->kode_kupas,
            'nama_kupas' => $request->nama_kupas,
        ]);
        $kupas->save();
        return redirect()->route('kupas')->with('success', 'Tambah data sukses!');
    }

    public function keperluan()
    {
        $keperluan = Keperluan::all();

        $data['title'] = 'Master Keperluan';
        return view('master/keperluan', $data, compact('keperluan'));
    }

    public function keperluan_add(Request $request)
    {
        $request->validate([
            'kode_keperluan' => 'required|unique:mstr_keperluan',
            'kep_keterangan' => '',
        ]);

        $keperluan = new Keperluan([
            'kode_keperluan' => $request->kode_keperluan,
            'kep_keterangan' => $request->kep_keterangan,
        ]);
        $keperluan->save();
        return redirect()->route('keperluan')->with('success', 'Tambah data sukses!');
    }

    public function helper()
    {
        $helper_view = HelperMstr::all();

        $data['title'] = 'Master Helper';
        return view('master/helper', $data, compact('helper_view'));
    }

    public function helper_add(Request $request)
    {
        $request->validate([
            'kode_helper' => 'required|unique:mstr_helper',
            'nama_helper' => '',
        ]);

        $helper = new HelperMstr([
            'kode_helper' => $request->kode_helper,
            'nama_helper' => $request->nama_helper,
        ]);
        $helper->save();
        return redirect()->route('helper')->with('success', 'Tambah data sukses!');
    }

    // =================== History : ============================================================= //

    public function trHistory_data(Request $request)
    {
        $data = TrHistory::leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_history.lokasi_tpn')
                        ->leftJoin('mstr_kayu', 'mstr_kayu.kode_kayu', '=', 'tr_history.jns_kayu')
                        ->orderBy('tr_history.lokasi_tpn','asc')
                        ->get(['tr_history.no_tpn','tr_history.lokasi_tpn','tr_history.no_btg','mstr_kayu.nama_kayu','tr_history.vol','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                        ->setTotalRecords(100)// ini untuk filter data agar lebih cepat, hapus jika tambah lambat
                        ->make(true);
    }    

    public function trHistory(Request $request)
    {
        $data['title'] = 'Transaksi History';
        return view('transaction/trHistory', $data);
    }

    // =================== Periode Operasional : ==================================================== //

    public function periodeOperasional()
    {
        // $periodeOperasional = PeriodeOperasional::all();
        $periodeOperasional = PeriodeOperasional::orderBy('no_periode')->get();

        $data['title'] = 'Periode Operasional';
        return view('transaction/periodeOperasional', $data, compact('periodeOperasional'));
    }

    public function periodeOperasional_add(Request $request)
    {
        $request->validate([
            'tahun_periode' => 'required',
            'no_periode' => 'required',
            'awal_tgl' => 'required',
            'akhir_tgl' => 'required',
            'kode_periode' => 'required',
        ]);

        $periodeOperasional = new PeriodeOperasional([
            'tahun_periode' => $request->tahun_periode,
            'no_periode' => $request->no_periode,
            'awal_tgl' => $request->awal_tgl,
            'akhir_tgl' => $request->akhir_tgl,
            'kode_periode' => $request->kode_periode,            
        ]);
        $periodeOperasional->save();
        return redirect()->route('periodeOperasional')->with('success', 'Tambah data sukses!');
    }
    public function periodeOperasional_actived($id_periode)
    {
        // $po = PeriodeOperasional::all();
        // $po->status_periode    = 0;
        // $po->save();

        $affected = DB::table('periode_operasional')
              ->where('status_periode', 1)
              ->update(['status_periode' => 0]);

        $po = PeriodeOperasional::find($id_periode);
        $po->status_periode    = 1;
        $po->save();
        return redirect()->route('periodeOperasional');
    }

    public static function getNewNoTpn($ko_loc)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_tpn_in')
                        ->select('no_tpn')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('lokasi_tpn','=',$ko_loc)
                        ->orderBy('no_tpn','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_tpn'], 13, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public static function getNewNoTpnOut($ko_loc)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_tpn_out')
                        ->select('no_tpn_out')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('lokasi_tpn','=',$ko_loc)
                        ->orderBy('no_tpn_out','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_tpn_out'], 13, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public static function getNewNoTpkOut($ko_loc)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_tpn_out')
                        ->select('no_tpn_out')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('lokasi_tpn','=',$ko_loc)
                        ->orderBy('no_tpn_out','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_tpn_out'], 13, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public static function getNewNoTkg($ko_loc)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $getLastNo = DB::table('tr_header_tpn_out')
                        ->select('no_loglist')
                        ->where('kode_periode','=',$jsonx[0]['kode_periode'])
                        ->where('tujuan','=',$ko_loc)
                        ->orderBy('no_loglist','desc')
                        ->get();        

        $jsonz = json_decode($getLastNo, true);
        $newNo1 = $jsonx[0]['kode_periode']."/";
        if($getLastNo->count() > 0) {
            $nourut = substr($jsonz[0]['no_loglist'], 13, 4);
            $nourut++;            
            $newNo2 = sprintf("%04s", $nourut) ;
            return $newNo1.$newNo2;
        }else{            
            $newNo3 = '0001';
            return $newNo1.$newNo3;
        }        
    }

    public static function getKodePeriodeOperasional()
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);
        return $jsonx[0]['kode_periode'];
    }

    public static function getTahunPeriodeOperasional()
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('tahun_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);        
        return $jsonx[0]['tahun_periode'];
    }


    // =================== TPN IN : ============================================================= //

    public function trHeaderTpn_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // $data = TrHeaderTpn::all();
        $data = TrHeaderTpn::where('kode_periode','=',$jsonx[0]['kode_periode'])
                            ->where('lokasi_tpn','=','002')
                            ->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpn').'/'.$data->id_header_tpn_in.'" class="edit btn btn-primary btn-sm">Detail</a>';

                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_in.'" data-kode="'.$data->no_tpn.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }    

    public function trHeaderTpn(Request $request)
    {

        $data['title'] = 'TPN - IN';
        return view('transaction/trHeaderTpn', $data);
    }

    public function trHeaderTpn_add(Request $request)
    {        
        $request->validate([
            'no_tpn' => 'required|unique:tr_header_tpn_in',
            'tgl_input_tpn' => 'required',
            'thn_produksi_tpn' => 'required',
            'lokasi_tpn' => '',
            'kode_periode' => '',
            'user_created_tpn' => '',
        ]);

        $trHeaderTpn = new TrHeaderTpn([
            'no_tpn' => $request->no_tpn,
            'tgl_input_tpn' => $request->tgl_input_tpn,
            'thn_produksi_tpn' => $request->thn_produksi_tpn,
            'lokasi_tpn' => $request->lokasi_tpn,
            'kode_periode' => $request->kode_periode,
            'user_created_tpn' => Auth::user()->name,
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        if($request->tgl_input_tpn < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderTpn')->with('error', 'Tanggal tidak sesuai dengan tahun periode!'); 
        }
        // exit();

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpn->save();
            $getIdHead = DB::table('tr_header_tpn_in')
                        ->select('*')->where('no_tpn',$request->no_tpn)
                        ->get();
            $jdIdHead = json_decode($getIdHead, true);
            return redirect()->route('trDetailTpn',$jdIdHead[0]['id_header_tpn_in'])->with('success', 'Tambah data Header sukses!');
            // return redirect()->route('trHeaderTpn')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpnDestroy_del(Request $request)
    {
        DB::beginTransaction();
        try
        {
            TrHeaderTpn::find($request->del_id)->delete();
            TrDetailTpn::where('id_header_tpn_in', $request->del_id)->delete();
            TrHistory::where('id_header_tpn_in', $request->del_id)->delete();
            DB::commit();
            return back()->with('success',' Data deleted successfully');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' There is some problem, please try again or call your admin!');
        }
    }

    public function trDetailTpn($id_header_tpn_in)
    {
        $getHeaderTpn = TrHeaderTpn::find($id_header_tpn_in);
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpn->lokasi_tpn)->get();        
        $kayu =  Kayu::all();
        $chainsaw = Chainsaw::all();
        $kupas = Kupas::all();
        $helperMstr = HelperMstr::all();
        $driver = Driver::where('kode_driver','>=',100)
                        ->where('kode_driver','<=',199)
                        ->get();
        $getDetTpn = TrDetailTpn::leftJoin('mstr_kayu as mk', 'mk.kode_kayu','=','tr_detail_tpn_in.jns_kayu')
                                ->leftJoin('mstr_chainsaw as mc', 'mc.kode_chainsaw','=','tr_detail_tpn_in.kode_chainsaw')
                                ->leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_detail_tpn_in.kode_driver')
                                ->leftJoin('mstr_kupas as kps', 'kps.kode_kupas','=','tr_detail_tpn_in.kode_kupas')
                                ->leftJoin('mstr_helper as hpr', 'hpr.kode_helper','=','tr_detail_tpn_in.kode_helper')
                                // ->whereNull('tr_detail_tpn_in.kode_kupas')
                                ->where('tr_detail_tpn_in.id_header_tpn_in','=',$id_header_tpn_in)
                                ->get(['tr_detail_tpn_in.*','mk.nama_kayu as mk','mc.nama_chainsaw as mc','md.nama_driver as md','kps.nama_kupas as kps','hpr.nama_helper as hpr']);
        // echo $id_header_tpn_in;
        // exit();
        
        $data['title'] = 'TPN Detail - IN';
        return view('transaction/trDetailTpn', $data, compact('getHeaderTpn','getLoc','kayu','chainsaw','kupas','helperMstr','driver','getDetTpn'));
        
    }

    public function trDetailTpn_add(Request $request)
    {

        $request->validate([
            'no_tpn' => 'required',
            'tgl_input_tpn' => 'required',
            'thn_produksi_tpn' => 'required',
            'jns_kayu' => 'required',
            'no_btg' => 'required|unique:tr_detail_tpn_in',
        ]);

        DB::beginTransaction();
        try{
            $trDetailTpn = new TrDetailTpn([
                'id_header_tpn_in' => $request->id_header_tpn_in,
                'no_tpn' => $request->no_tpn,
                'hph' => $request->hph,
                'tgl_input_tpn' => $request->tgl_input_tpn,
                'thn_produksi_tpn' => $request->thn_produksi_tpn,
                'lokasi_tpn' => $request->lokasi_tpn,
                'thn_rkt' => $request->thn_rkt,
                'no_btg' => $request->no_btg,
                'tgl_ukur' => $request->tgl_ukur,
                'jns_kayu' => $request->jns_kayu,
                'kode_chainsaw' => $request->kode_chainsaw,
                'kode_driver' => $request->kode_driver,
                'kode_kupas' => $request->kode_kupas,
                'kode_helper' => $request->kode_helper,
                'pjg' => $request->pjg,
                'pkl' => $request->pkl,
                'ujg' => $request->ujg,
                'rt2' => $request->rt2,
                'vol' => $request->vol,
                'cct' => $request->cct,
                'pcct' => $request->pcct,
                'petak' => $request->petak,
                'kelas' => $request->kelas,
                'timbul' => $request->timbul,
                'position' => "current",
                'user_created_tpn' => Auth::user()->name,
                'createdAt' => date('Y-m-d H:i:s'),
            ]);

            $trHistory = new TrHistory([
                'id_header_tpn_in' => $request->id_header_tpn_in,
                'no_tpn' => $request->no_tpn,
                'hph' => $request->hph,
                'tgl_input_tpn' => $request->tgl_input_tpn,
                'thn_produksi_tpn' => $request->thn_produksi_tpn,
                'lokasi_tpn' => $request->lokasi_tpn,
                'thn_rkt' => $request->thn_rkt,
                'no_btg' => $request->nobtgx,
                'tgl_ukur' => $request->tgl_ukur,
                'jns_kayu' => $request->jns_kayu,
                'vol' => $request->vol,
                'petak' => $request->petak,
                'kelas' => $request->kelas,
                'timbul' => $request->timbul,
                'position' => "IN",
                'createdAt' => date('Y-m-d H:i:s'),
            ]);

            if (Auth::user()->username == null or Auth::user()->username == "") {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/');
            }else{
                $trDetailTpn->save();
                $trHistory->save();
                DB::commit();            
            }
            return redirect()->route('trDetailTpn',[$request->id_header_tpn_in])->with('success', 'Tambah data sukses!');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('trDetailTpn',[$request->id_header_tpn_in])->with('error', 'There is some problem, please try again or call your admin!');
        }
    }

    public function trDetailTpn_edit(Request $request)
    {
        DB::beginTransaction();
        try{        
            TrDetailTpn::where('no_btg', $request->no_btg)
                      ->update(['thn_rkt' => $request->thn_rkt, 
                                'tgl_ukur' => $request->tgl_ukur,
                                'jns_kayu' => $request->jns_kayu,
                                'kode_chainsaw' => $request->kode_chainsaw,
                                'kode_driver' => $request->kode_driver,
                                'kode_kupas' => $request->kode_kupas,
                                'kode_helper' => $request->kode_helper,
                                'pjg' => $request->pjg,
                                'pkl' => $request->pkl,
                                'ujg' => $request->ujg,
                                'rt2' => $request->rt2,
                                'cct' => $request->cct,
                                'pcct' => $request->pcct,
                                'vol' => $request->vol,
                                'petak' => $request->petak,
                                'kelas' => $request->kelas,
                                'timbul' => $request->timbul,
                                'user_updated_tpn' => Auth::user()->name,
                                'updatedAt' => date('Y-m-d H:i:s'),
                                ]);
            TrHistory::where('no_btg', $request->no_btg)
                      ->update(['thn_rkt' => $request->thn_rkt, 
                                'tgl_ukur' => $request->tgl_ukur,
                                'jns_kayu' => $request->jns_kayu,                            
                                'vol' => $request->vol,
                                'petak' => $request->petak,
                                'kelas' => $request->kelas,
                                'timbul' => $request->timbul,
                                ]);
            DB::commit();
            return redirect()->route('trDetailTpn',[$request->id_header_tpn_in])->with('success', 'Edit data sukses!');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('trDetailTpn',[$request->id_header_tpn_in])->with('error', 'There is some problem, please try again or call your admin!');
        }
    }

    public function trDetailTpn_editforuser(Request $request)
    {
        DB::beginTransaction();
        try{        
            TrDetailTpn::where('no_btg', $request->no_btg)
                      ->update(['pjg' => $request->pjg,
                                'pkl' => $request->pkl,
                                'ujg' => $request->ujg,
                                'rt2' => $request->rt2,
                                'cct' => $request->cct,
                                'pcct' => $request->pcct,
                                'vol' => $request->vol,
                                'petak' => $request->petak,
                                'kelas' => $request->kelas,
                                'user_updated_tpn' => Auth::user()->name,
                                'updatedAt' => date('Y-m-d H:i:s'),
                                ]);
            TrHistory::where('no_btg', $request->no_btg)
                      ->update(['vol' => $request->vol,
                                'petak' => $request->petak,
                                'kelas' => $request->kelas,
                                ]);
            DB::commit();
            return redirect()->route('trDetailTpn',[$request->id_header_tpn_in])->with('success', 'Edit data sukses!');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('trDetailTpn',[$request->id_header_tpn_in])->with('error', 'There is some problem, please try again or call your admin!');
        }
    }

    public function trDetailTpn_del(Request $request)
    {
        DB::beginTransaction();
        try{
            TrDetailTpn::where('no_btg', $request->del_id)->delete();
            TrHistory::where('no_btg', $request->del_id)->delete();
            DB::commit();
            return back()->with('success',' Data deleted successfully');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' There is some problem, please try again or call your admin!');
        }
    }

    // =================== TPN OUT TPK : ============================================== //
    

    public function trHeaderTpnOut(Request $request)
    {

        $driver = Driver::where('kode_driver','>=',001)
                        ->where('kode_driver','<=',050)
                        ->get();
        $driverAng = Driver::where('kode_driver','>=',201)
                        ->where('kode_driver','<=',450)
                        ->get();                        
        $unitAlat = UnitAlat::where('kode_unit_a','>=',101)
                            ->where('kode_unit_a','<=',150)
                            ->get();
        $unitAlatAng = UnitAlat::where('kode_unit_a','>=',201)
                            ->get();
        $data['title'] = 'TPN - OUT >> TPK';
        return view('transaction/trHeaderTpnOut', $data, compact('driver','unitAlat','driverAng','unitAlatAng'));
    }

    public function trHeaderTpnOut_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.tujuan','=','601')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpnOut').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTpnOut_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $trHeaderTpnOut = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'optBongkar' => $request->optBongkar,
            'bongkarUnit' => $request->bongkarUnit,
            'optAngkut' => $request->optAngkut,
            'angkutUnit' => $request->angkutUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpnOut->save();
            $getIdHead = DB::table('tr_header_tpn_out')
                        ->select('*')->where('no_tpn_out',$request->no_tpn_out)
                        ->get();
            $jdIdHead = json_decode($getIdHead, true);
            return redirect()->route('trDetailTpnOut',$jdIdHead[0]['id_header_tpn_out'])->with('success', 'Tambah data Header sukses!');
            // return redirect()->route('trHeaderTpnOut')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpnOutDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTpnOut($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->leftJoin('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        $getNoBtg =  TrDetailTpn::leftJoin('tr_detail_position', 'tr_detail_position.no_btg', '=', 'tr_detail_tpn_in.no_btg')
                                ->where('tr_detail_tpn_in.lokasi_tpn','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                ->whereNull('tr_detail_position.no_btg')
                                ->get(['tr_detail_tpn_in.no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::leftJoin('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail TPN OUT - TPK';
        return view('transaction/trDetailTpnOut', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTpnOut_add(Request $request)
    {    
        $request->validate(['no_btg' => 'required'
                                ]);

        DB::beginTransaction();
        try
        {
            $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpn)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
            if ($cekNoBtg->isEmpty()) 
            {
                TrDetailTpn::where('no_btg', $request->no_btg)
                              ->update(['position' => "passed"]);

                $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();                               

                $trDetailTpnOut = new TrDetailPosition([
                    'id_header' => $request->id_header_tpn_out,
                    'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                    'no_tpn_tpk' => $request->no_tpn_out,
                    'hph' => $getIdHph[0]['hph'],
                    'tgl_input' => $request->tgl_input_tpn_out,
                    'from_lokasi' => $request->lokasi_tpn,
                    'to_lokasi' => $request->lokasi_tujuan,
                    'no_btg' => $request->no_btg,
                    'position' => "current",
                    'user_created' => Auth::user()->name,
                    'createdAt' => date('Y-m-d H:i:s'),
                ]);

                $trHistory = new TrHistory([
                    'no_tpn' => $request->no_tpn_out,
                    'hph' => $getIdHph[0]['hph'],
                    'tgl_input_tpn' => $request->tgl_input_tpn_out,
                    'lokasi_tpn' => $request->lokasi_tujuan,
                    'no_btg' => $request->no_btg,
                    'position' => "IN",
                    'createdAt' => date('Y-m-d H:i:s'),
                ]);

                if (Auth::user()->username == null or Auth::user()->username == "") {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect('/');
                }else{
                    $trDetailTpnOut->save();
                    $trHistory->save();
                    //-----------query delete duplicate table------------
                    $Del = DB::delete("DELETE FROM tr_detail_position WHERE id_detail_position IN (SELECT no_akhir FROM (SELECT n.no_tpn_tpk, n.no_btg, n.from_lokasi, n.to_lokasi, MAX(n.id_detail_position) as no_akhir 
                        FROM tr_detail_position as n 
                        WHERE n.position='current'
                        GROUP BY n.no_tpn_tpk, n.no_btg, n.from_lokasi, n.to_lokasi 
                        HAVING COUNT(*) > 1) x)
                        ");
                    $DelHist = DB::delete("DELETE FROM tr_history WHERE id_history IN (SELECT no_akhir FROM (SELECT n.no_tpn, n.lokasi_tpn, n.no_btg, MAX(n.id_history) as no_akhir 
                        FROM tr_history as n 
                        WHERE n.position='IN'
                        GROUP BY n.no_tpn, n.lokasi_tpn, n.no_btg 
                        HAVING COUNT(*) > 1) x)
                        "); 
                    //------------------------------------------------------                
                    DB::commit();
                    return redirect()->route('trDetailTpnOut',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                }
            }else{
                return redirect()->route('trDetailTpnOut',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');      
            }
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('trDetailTpnOut',[$request->id_header_tpn_out])->with('error', 'There is some problem, please try again or call your admin!');
        }
    }

    public function trDetailTpnOut_del(Request $request)
    {
        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', '601')
                            ->delete();

            TrDetailTpn::where('no_btg', $request->nobtg_del)
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', '601')
                    ->delete();
            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' There is some problem, please try again or call your admin!');
        }
    }

    // =================== TPN OUT LOGPOND ========================================== //
    

    public function trHeaderTpnOutLogpond(Request $request)
    {

        $driver = Driver::where('kode_driver','>=',001)
                        ->where('kode_driver','<=',050)
                        ->get();
        $driverAng = Driver::where('kode_driver','>=',201)
                        ->where('kode_driver','<=',450)
                        ->get();                        
        $unitAlat = UnitAlat::where('kode_unit_a','>=',101)
                            ->where('kode_unit_a','<=',150)
                            ->get();
        $unitAlatAng = UnitAlat::where('kode_unit_a','>=',201)
                            ->get();
        $data['title'] = 'TPN - OUT >> LOGPOND';
        return view('transaction/trHeaderTpnOutLogpond', $data, compact('driver','unitAlat','driverAng','unitAlatAng'));
    }

    public function trHeaderTpnOutLogpond_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','002')
                                ->where('tr_header_tpn_out.tujuan','=','730')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpnOutLogpond').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTpnOutLogpond_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $trHeaderTpnOut = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'optBongkar' => $request->optBongkar,
            'bongkarUnit' => $request->bongkarUnit,
            'optAngkut' => $request->optAngkut,
            'angkutUnit' => $request->angkutUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpnOut->save();
            $getIdHead = DB::table('tr_header_tpn_out')
                        ->select('*')->where('no_tpn_out',$request->no_tpn_out)
                        ->get();
            $jdIdHead = json_decode($getIdHead, true);
            return redirect()->route('trDetailTpnOut',$jdIdHead[0]['id_header_tpn_out'])->with('success', 'Tambah data Header sukses!');
            // return redirect()->route('trHeaderTpnOut')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpnOutLogpondDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTpnOutLogpond($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->leftJoin('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        $getNoBtg =  TrDetailTpn::leftJoin('tr_detail_position', 'tr_detail_position.no_btg', '=', 'tr_detail_tpn_in.no_btg')
                                ->where('tr_detail_tpn_in.lokasi_tpn','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                ->whereNull('tr_detail_position.no_btg')
                                ->get(['tr_detail_tpn_in.no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::leftJoin('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail TPN OUT - LOGPOND';
        return view('transaction/trDetailTpnOut', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTpnOutLogpond_add(Request $request)
    {    
        $request->validate(['no_btg' => 'required'
                                ]);

        DB::beginTransaction();
        try
        {
            $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpn)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
            if ($cekNoBtg->isEmpty()) 
            {
                TrDetailTpn::where('no_btg', $request->no_btg)
                              ->update(['position' => "passed"]);

                $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();                               

                $trDetailTpnOut = new TrDetailPosition([
                    'id_header' => $request->id_header_tpn_out,
                    'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                    'no_tpn_tpk' => $request->no_tpn_out,
                    'hph' => $getIdHph[0]['hph'],
                    'tgl_input' => $request->tgl_input_tpn_out,
                    'from_lokasi' => $request->lokasi_tpn,
                    'to_lokasi' => $request->lokasi_tujuan,
                    'no_btg' => $request->no_btg,
                    'position' => "current",
                    'user_created' => Auth::user()->name,
                    'createdAt' => date('Y-m-d H:i:s'),
                ]);

                $trHistory = new TrHistory([
                    'no_tpn' => $request->no_tpn_out,
                    'hph' => $getIdHph[0]['hph'],
                    'tgl_input_tpn' => $request->tgl_input_tpn_out,
                    'lokasi_tpn' => $request->lokasi_tujuan,
                    'no_btg' => $request->no_btg,
                    'position' => "IN",
                    'createdAt' => date('Y-m-d H:i:s'),
                ]);

                if (Auth::user()->username == null or Auth::user()->username == "") {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect('/');
                }else{
                    $trDetailTpnOut->save();
                    $trHistory->save();
                    //-----------query delete duplicate table------------
                    $Del = DB::delete("DELETE FROM tr_detail_position WHERE id_detail_position IN (SELECT no_akhir FROM (SELECT n.no_tpn_tpk, n.no_btg, n.from_lokasi, n.to_lokasi, MAX(n.id_detail_position) as no_akhir 
                        FROM tr_detail_position as n 
                        WHERE n.position='current'
                        GROUP BY n.no_tpn_tpk, n.no_btg, n.from_lokasi, n.to_lokasi 
                        HAVING COUNT(*) > 1) x)
                        ");
                    $DelHist = DB::delete("DELETE FROM tr_history WHERE id_history IN (SELECT no_akhir FROM (SELECT n.no_tpn, n.lokasi_tpn, n.no_btg, MAX(n.id_history) as no_akhir 
                        FROM tr_history as n 
                        WHERE n.position='IN'
                        GROUP BY n.no_tpn, n.lokasi_tpn, n.no_btg 
                        HAVING COUNT(*) > 1) x)
                        "); 
                    //------------------------------------------------------                
                    DB::commit();
                    return redirect()->route('trDetailTpnOut',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                }
            }else{
                return redirect()->route('trDetailTpnOut',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');      
            }
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('trDetailTpnOut',[$request->id_header_tpn_out])->with('error', 'There is some problem, please try again or call your admin!');
        }
    }

    public function trDetailTpnOutLogpond_del(Request $request)
    {
        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', '730')
                            ->delete();

            TrDetailTpn::where('no_btg', $request->nobtg_del)
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', '730')
                    ->delete();
            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' There is some problem, please try again or call your admin!');
        }
    }
    

    // =================== TPK OUT Logpond ======================================= //
    

    public function trHeaderTpkOutLogpond(Request $request)
    {

        $driver = Driver::where('kode_driver','>=',001)
                        ->where('kode_driver','<=',050)
                        ->get();
        $driverAng = Driver::where('kode_driver','>=',201)
                        ->where('kode_driver','<=',450)
                        ->get();                        
        $unitAlat = UnitAlat::where('kode_unit_a','>=',101)
                            ->where('kode_unit_a','<=',150)
                            ->get();
        $unitAlatAng = UnitAlat::where('kode_unit_a','>=',201)
                            ->get();
        $data['title'] = 'Header TPK OUT >> Logpond';
        return view('transaction/trHeaderTpkOutLogpond', $data, compact('driver','driverAng','unitAlat','unitAlatAng'));
    }

    public function trHeaderTpkOutLogpond_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->join('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','601')
                                ->where('tr_header_tpn_out.tujuan','=','730')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailTpkOutLogpond').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';
                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderTpkOutLogpond_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);
        
        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderTpkOutLogpond')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        } 

        // exit();

        $trHeaderTpkOutLogpond = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'optBongkar' => $request->optBongkar,
            'bongkarUnit' => $request->bongkarUnit,
            'optAngkut' => $request->optAngkut,
            'angkutUnit' => $request->angkutUnit,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderTpkOutLogpond->save();
            $getIdHead = DB::table('tr_header_tpn_out')
                        ->select('*')->where('no_tpn_out',$request->no_tpn_out)
                        ->get();
            $jdIdHead = json_decode($getIdHead, true);
            return redirect()->route('trDetailTpkOutLogpond',$jdIdHead[0]['id_header_tpn_out'])->with('success', 'Tambah data Header sukses!');
            // return redirect()->route('trHeaderTpkOutLogpond')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderTpkOutLogpondDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailTpkOutLogpond($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_driver as mdb', 'mdb.kode_driver','=','tr_header_tpn_out.optBongkar')
                                ->leftJoin('mstr_unit_alat as muab', 'muab.kode_unit_a', '=', 'tr_header_tpn_out.bongkarUnit')
                                ->leftJoin('mstr_driver as mda', 'mda.kode_driver','=','tr_header_tpn_out.optAngkut')
                                ->leftJoin('mstr_unit_alat as muaa', 'muaa.kode_unit_a', '=', 'tr_header_tpn_out.angkutUnit')
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->leftJoin('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mdb.nama_driver as mdb','muab.nomor_pintu as muab','mda.nama_driver as mda','muaa.nomor_pintu as muaa','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo']);
                                // echo $getHeaderTpnOut[0]['lokasi_tpn'];
                                // exit();
        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::leftJoin('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail TPK OUT - Logpond';
        return view('transaction/trDetailTpkOutLogpond', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailTpkOutLogpond_add(Request $request)
    {    
        if($request->no_btg == ""){
            return redirect()->route('trDetailTpkOutLogpond',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);

                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get(); 

                    $trDetailTpkOutLogpond = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "current",
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailTpkOutLogpond->save();
                        $trHistory->save();
                        //-----------query delete duplicate table------------
                        $Del = DB::delete("DELETE FROM tr_detail_position WHERE id_detail_position IN (SELECT no_akhir FROM (SELECT n.no_tpn_tpk, n.no_btg, n.from_lokasi, n.to_lokasi, MAX(n.id_detail_position) as no_akhir 
                            FROM tr_detail_position as n 
                            WHERE n.position='current'
                            GROUP BY n.no_tpn_tpk, n.no_btg, n.from_lokasi, n.to_lokasi 
                            HAVING COUNT(*) > 1) x)
                            ");
                        $DelHist = DB::delete("DELETE FROM tr_history WHERE id_history IN (SELECT no_akhir FROM (SELECT n.no_tpn, n.lokasi_tpn, n.no_btg, MAX(n.id_history) as no_akhir 
                            FROM tr_history as n 
                            WHERE n.position='IN'
                            GROUP BY n.no_tpn, n.lokasi_tpn, n.no_btg 
                            HAVING COUNT(*) > 1) x)
                            "); 
                        //------------------------------------------------------ 
                        DB::commit();
                        return redirect()->route('trDetailTpkOutLogpond',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailTpkOutLogpond',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailTpkOutLogpond',[$request->id_header_tpn_out])->with('error', 'There is some problem, please try again or call your admin!');
            }
        }
    }

    public function trDetailTpkOutLogpond_del(Request $request)
    {
        DB::beginTransaction();
        try
        {

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', '710')
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                          ->where('to_lokasi', '601')
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', '710')
                    ->delete();
            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' There is some problem, please try again or call your admin!');
        }
    }


    // =================== Logpond OUT Tongkang ================================= //
    

    public function trHeaderLogpondOutTongkang(Request $request)
    {

        $driver =  Driver::where('kode_driver','>=',500)->get();
        $driverMuat = Driver::where('kode_driver','>=',001)
                        ->where('kode_driver','<=',050)
                        ->get();
        $tongkang =  Tongkang::all();
        $unitAlat = UnitAlat::where('kode_unit_a','>=',500)->get();
        $unitAlatMuat = UnitAlat::where('kode_unit_a','>=',101)
                            ->where('kode_unit_a','<=',150)
                            ->get();
        $data['title'] = 'Header Logpond >> Tongkang';
        return view('transaction/trHeaderLogpondOutTongkang', $data, compact('driver','driverMuat','tongkang','unitAlat','unitAlatMuat'));
    }

    public function trHeaderLogpondOutTongkang_data(Request $request)
    {
        $getNPO = DB::table('periode_operasional')
                        ->select('kode_periode')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        $data = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_unit_alat as kt', 'kt.kode_unit_a', '=', 'tr_header_tpn_out.kapalTongkang')                                
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.kode_periode','=',$jsonx[0]['kode_periode'])
                                ->where('tr_header_tpn_out.lokasi_tpn','=','730')
                                ->where('tr_header_tpn_out.tujuan','=','800')
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','kt.nomor_pintu as kt','mstr_lokasi.nama_lokasi']);
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){

                    $btn = '<a href="'. url('trDetailLogpondOutTongkang').'/'.$data->id_header_tpn_out.'" class="edit btn btn-primary btn-sm">Detail</a>';

                    if(Auth::user()->level == "administrator"){
                    $btn = $btn.'<a href="#" data-toggle="modal" data-target="#modal-delete" data-id="'.$data->id_header_tpn_out.'" data-kode="'.$data->no_tpn_out.'" class="btn btn-danger btn-sm delete-confirm">Delete</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function trHeaderLogpondOutTongkang_add(Request $request)
    {
        $request->validate([
            'no_tpn_out' => 'required|unique:tr_header_tpn_out',
            'tgl_input_tpn_out' => 'required',
            'trip' => 'required',
        ]);

        // echo $request->kapalTongkang; exit();

        $getNPO = DB::table('periode_operasional')
                        ->select('*')->where('status_periode','1')
                        ->get();
        $jsonx = json_decode($getNPO, true);

        // Creating timestamp from given date
        $timestamp1 = strtotime($jsonx[0]['awal_tgl']);
        $timestamp2 = strtotime($jsonx[0]['akhir_tgl']);
         
        // Creating new date format from that timestamp
        $new_date1 = date("d-m-Y", $timestamp1);
        $new_date2 = date("d-m-Y", $timestamp2);

        if($request->tgl_input_tpn_out < $jsonx[0]['awal_tgl'] || $request->tgl_input_tpn_out > $jsonx[0]['akhir_tgl'])
        {
           return redirect()->route('trHeaderLogpondOutTongkang')->with('error', 'Tanggal harus sesuai dengan tahun periode! ('.$new_date1.' to '.$new_date2.')'); 
        }        

        $trHeaderLogpondOutTongkang = new TrHeaderTpnOut([
            'no_tpn_out' => $request->no_tpn_out,
            'no_loglist' => $request->no_loglist,
            'tgl_input_tpn_out' => $request->tgl_input_tpn_out,
            'trip' => $request->trip,
            'lokasi_tpn' => $request->lokasi_tpn,
            'tujuan' => $request->tujuan,
            'optMuat' => $request->optMuat,
            'muatUnit' => $request->muatUnit,
            'kapalTongkang' => $request->kapalTongkang,
            'kode_periode' => $request->kode_periode,
            'user_created' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (Auth::user()->username == null or Auth::user()->username == "") {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            $trHeaderLogpondOutTongkang->save();
            $getIdHead = DB::table('tr_header_tpn_out')
                        ->select('*')->where('no_tpn_out',$request->no_tpn_out)
                        ->get();
            $jdIdHead = json_decode($getIdHead, true);
            return redirect()->route('trDetailLogpondOutTongkang',$jdIdHead[0]['id_header_tpn_out'])->with('success', 'Tambah data Header sukses!');
            // return redirect()->route('trHeaderLogpondOutTongkang')->with('success', 'Tambah data sukses!');
        }        
    }

    public function trHeaderLogpondOutTongkangDestroy_del(Request $request)
    {

        $getDetTpn =  TrDetailPosition::where('no_tpn_tpk','=',$request->notpn_del)->get();
        if (!$getDetTpn->isEmpty()) 
        { 
            return back()->with('error',' Failed, Hapus data detail terlebih dahulu!');
        }else{
            TrHeaderTpnOut::find($request->del_id)->delete();
            return back()->with('success',' Data deleted successfully');
        }
    }

    public function trDetailLogpondOutTongkang($id_header_tpn_out)
    {
        $getHeaderTpnOut = TrHeaderTpnOut::leftJoin('mstr_driver as md', 'md.kode_driver','=','tr_header_tpn_out.optMuat')
                                ->leftJoin('mstr_unit_alat as mua', 'mua.kode_unit_a', '=', 'tr_header_tpn_out.muatUnit')
                                ->leftJoin('mstr_unit_alat as muakt', 'muakt.kode_unit_a', '=', 'tr_header_tpn_out.kapalTongkang')                                
                                ->leftJoin('mstr_lokasi', 'mstr_lokasi.kode_lokasi', '=', 'tr_header_tpn_out.lokasi_tpn')
                                ->leftJoin('mstr_lokasi as mlo', 'mlo.kode_lokasi', '=', 'tr_header_tpn_out.tujuan')
                                ->where('tr_header_tpn_out.id_header_tpn_out','=',$id_header_tpn_out)
                                ->get(['tr_header_tpn_out.*','md.nama_driver as md','mua.nomor_pintu as mua','mstr_lokasi.nama_lokasi','mlo.nama_lokasi as mlo','muakt.nomor_pintu as muakt']);

        $getLoc =  Lokasi::where('kode_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])->get();
        
        $getNoBtg = TrDetailPosition::where('to_lokasi','=',$getHeaderTpnOut[0]['lokasi_tpn'])
                                    ->where('position','=','current')
                                    ->get(['no_btg']);
        $kayu =  Kayu::all();
        $getDetPos =  TrDetailPosition::leftJoin('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu', '=', 'tdti.jns_kayu')
                                    ->where('tr_detail_position.id_header','=',$id_header_tpn_out)
                                    ->where('tr_detail_position.position','=',"current")
                                    ->get(['tr_detail_position.*', 
                                        'tdti.thn_produksi_tpn as thn_prod', 
                                        'tdti.thn_rkt as thn_rkt',
                                        'tdti.petak as petak',
                                        'mk.nama_kayu as nm_kayu',
                                        'tdti.pjg as pjg',
                                        'tdti.pkl as pkl',
                                        'tdti.ujg as ujg',
                                        'tdti.rt2 as rt2',
                                        'tdti.cct as cct',
                                        'tdti.pcct as pcct',
                                        'tdti.vol as vol',
                                    ]);
        
        $data['title'] = 'Detail Logpond >> Tongkang';
        return view('transaction/trDetailLogpondOutTongkang', $data, compact('getHeaderTpnOut','getLoc','getNoBtg','kayu','getDetPos'));
        
    }

    public function trDetailLogpondOutTongkang_add(Request $request)
    {    
        if($request->no_btg == ""){
            return redirect()->route('trDetailLogpondOutTongkang',[$request->id_header_tpn_out])->with('error', 'Failed, Nomor Btg harus dipilih!');
        }else{

            DB::beginTransaction();
            try
            {
                $cekNoBtg =  TrDetailPosition::where('no_btg','=',$request->no_btg)
                                            ->where('from_lokasi','=', $request->lokasi_tpk)
                                            ->where('to_lokasi','=', $request->lokasi_tujuan)
                                            ->where('position','=',"current",)
                                            ->get();
                if ($cekNoBtg->isEmpty()) 
                {
                    TrDetailPosition::where('no_btg', $request->no_btg)
                                  ->where('to_lokasi', $request->lokasi_tpk)
                                  ->update(['position' => "passed"]);

                    $getIdHph = TrDetailTpn::where('no_btg', $request->no_btg)
                                    ->get();

                    $trDetailLogpondOutTongkang = new TrDetailPosition([
                        'id_header' => $request->id_header_tpn_out,
                        'id_detail_tpn_in' => $getIdHph[0]['id_detail_tpn_in'],
                        'no_tpn_tpk' => $request->no_tpn_out,
                        'no_loglist' => $request->no_loglist,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input' => $request->tgl_input_tpn_out,
                        'from_lokasi' => $request->lokasi_tpk,
                        'to_lokasi' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "current",
                        'user_created' => Auth::user()->name,
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    $trHistory = new TrHistory([
                        'no_tpn' => $request->no_tpn_out,
                        'hph' => $getIdHph[0]['hph'],
                        'tgl_input_tpn' => $request->tgl_input_tpn_out,
                        'lokasi_tpn' => $request->lokasi_tujuan,
                        'no_btg' => $request->no_btg,
                        'position' => "IN",
                        'createdAt' => date('Y-m-d H:i:s'),
                    ]);

                    if (Auth::user()->username == null or Auth::user()->username == "") {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return redirect('/');
                    }else{
                        $trDetailLogpondOutTongkang->save();
                        $trHistory->save();
                        //-----------query delete duplicate table------------
                        $Del = DB::delete("DELETE FROM tr_detail_position WHERE id_detail_position IN (SELECT no_akhir FROM (SELECT n.no_tpn_tpk, n.no_btg, n.from_lokasi, n.to_lokasi, MAX(n.id_detail_position) as no_akhir 
                            FROM tr_detail_position as n 
                            WHERE n.position='current'
                            GROUP BY n.no_tpn_tpk, n.no_btg, n.from_lokasi, n.to_lokasi 
                            HAVING COUNT(*) > 1) x)
                            ");
                        $DelHist = DB::delete("DELETE FROM tr_history WHERE id_history IN (SELECT no_akhir FROM (SELECT n.no_tpn, n.lokasi_tpn, n.no_btg, MAX(n.id_history) as no_akhir 
                            FROM tr_history as n 
                            WHERE n.position='IN'
                            GROUP BY n.no_tpn, n.lokasi_tpn, n.no_btg 
                            HAVING COUNT(*) > 1) x)
                            "); 
                        //------------------------------------------------------ 
                        DB::commit();
                        return redirect()->route('trDetailLogpondOutTongkang',[$request->id_header_tpn_out])->with('success', 'Tambah data sukses!');
                    }
                }else{
                    return redirect()->route('trDetailLogpondOutTongkang',[$request->id_header_tpn_out])->with('error', 'Duplicate entry, please back to menu and check Nomor Batang!');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route('trDetailLogpondOutTongkang',[$request->id_header_tpn_out])->with('error', 'There is some problem, please try again or call your admin!');
            }
        }
    }

    public function trDetailLogpondOutTongkang_del(Request $request)
    {

        DB::beginTransaction();
        try
        {            

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                            ->where('to_lokasi', $request->tolok_del)
                            ->delete();

            TrDetailPosition::where('no_btg', $request->nobtg_del)
                          ->where('to_lokasi', $request->fromlok_del)
                          ->update(['position' => 'current']);

            TrHistory::where('no_btg', $request->nobtg_del)
                    ->where('lokasi_tpn', $request->tolok_del)
                    ->delete();

            DB::commit();

            return back()->with('success',' Data deleted successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' There is some problem, please try again or call your admin!');
        }
    }

    // ------------------- Tongkang ---------------------------//

    public function trTongkang(Request $request)
    {

        $data['title'] = 'Transaksi Tongkang';
        return view('transaction/trTongkang', $data);
    }

    public function trTongkang_data(Request $request)
    {

        $data = TrDetailPosition::join('tr_detail_tpn_in as tdti','tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.to_lokasi', '=', '800')
                                ->groupBy('tr_detail_position.no_loglist')
                                ->select('tr_detail_position.no_loglist', DB::raw('truncate(sum(tdti.vol),2) as volall'))
                                ->get(['no_loglist','volall']);

        return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($data){

                            $btn = '<a href="'. url('trLogListTkg').'/'.str_replace("/","_",$data->no_loglist).'" class="edit btn btn-primary btn-sm">Detail</a>';
                            
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);        
    }

    public function trLogListTkg($no_loglist)
    {;
        $no_log = str_replace("_","/",$no_loglist);
        Session::put('nologlist', $no_log);
        $data['title'] = 'Detail No Loglist';
        return view('transaction/trLogListTkg', $data);
    }

    public function trLoglistModal_data(Request $request)
    {
        $nolog = Session::get('nologlist');
        $data = TrDetailPosition::leftJoin('tr_detail_tpn_in as tdi', 'tdi.no_btg','=','tr_detail_position.no_btg')
                                ->leftJoin('mstr_kayu as mk', 'mk.kode_kayu','=','tdi.jns_kayu')
                                ->where('tr_detail_position.no_loglist','=',$nolog)
                                ->where('tr_detail_position.to_lokasi','=','800')
                                ->get(['tr_detail_position.no_loglist as nolog','tdi.thn_produksi_tpn as tpt','tdi.thn_rkt as trk','mk.nama_kayu as nk','tdi.petak as ptk','tr_detail_position.no_btg as nobt','tdi.pjg as pj','tdi.ujg as uj','tdi.pkl as pk','tdi.rt2 as rt','tdi.vol as vl','tdi.cct as ct','tdi.pcct as pc']);
        return Datatables::of($data)
                        ->make(true);
    }    

    public function trLoglistModal_edit(Request $request)
    {
        DB::beginTransaction();
        try
        {            
            TrDetailPosition::where('no_loglist', $request->nolog_id)
                            ->where('to_lokasi', '800')
                            ->update(['position' => 'closed']);
            DB::commit();

            return back()->with('success',' Data Closed successfully');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error',' There is some problem, please try again or call your admin!');
        }
    }

    public static function getClosedTkg($nolog)
    {        
        $getLastNo = TrDetailPosition::where('no_loglist', $nolog)
                                    ->first(['position']);     

        $newNo = $getLastNo->position;
        
        return $newNo;
              
    }

    // ------------------- Reporting --------------------------//

    public static function getQtyKayuAllHome($hph,$loc)
    {

        $getKy = TrDetailPosition::where('hph', $hph)
                                ->where('to_lokasi',$loc)
                                ->where('position','current')
                                ->get(['position']);

        $getKy2 = TrDetailTpn::where('hph', $hph)
                            ->where('lokasi_tpn',$loc)
                            ->where('position','current')
                            ->get(['position']);

        $gk = count($getKy);
        $gk2 = count($getKy2);

        $gkx = $gk + $gk2;
        if($gkx > 0) {
            return $gkx;
        }else{            
            $gkx = 0;
            return $gkx;
        }
    }

    public static function getVolKayuAllHome($hph,$loc)
    {
        $getVolTpn = TrDetailTpn::where('hph', $hph)
                            ->where('lokasi_tpn',$loc)
                            ->where('position','current')
                            ->sum('vol');

        $getVolNoTpn = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tr_detail_position.to_lokasi',$loc)
                                ->where('tr_detail_position.position','current')
                                ->sum('tdti.vol');
        $getVolAll = $getVolTpn + $getVolNoTpn;
        if($getVolAll > 0) {
            $decimals = 2;
            $expo = pow(10,$decimals);
            // $number = intval($getVolAll*$expo)/$expo;
            $number = number_format($getVolAll,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public function rptStokKayu_rpt(Request $request)
    {   
        // $pieces = explode("-", $request->tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        $stDt = date("d-m-Y", strtotime($request->tgl_laporan));
        $thnProd = date("Y", strtotime($request->tgl_laporan));

        // $eDt = date("d-m-Y", strtotime($endDt));        

        $getSel = DB::select(DB::raw("SELECT e.thn_produksi_tpn as thnprod,
                                            sum(e.tpn2) as tpn2Qty,
                                            round(sum(e.tpn2Vol),2) as tpn2Vol,
                                            sum(e.tpk57) as tpk57Qty,
                                            round(sum(e.tpk57Vol),2) as tpk57Vol,
                                            sum(e.lkd) as lkdQty,
                                            round(sum(e.lkdVol),2) as lkdVol,
                                            sum(e.tong) as tongQty,
                                            round(sum(e.tongVol),2) as tongVol,
                                            sum(e.tpn2)+sum(e.tpk57)+sum(e.lkd) as totalQty,
                                            round(sum(e.tpn2Vol)+sum(e.tpk57Vol)+sum(e.lkdVol),2) as totalVol
                                            
                                        FROM (SELECT a.thn_produksi_tpn,
                                              CASE WHEN a.lokasi_tpn = '002' THEN 1 ELSE 0 END as tpn2,
                                              CASE WHEN a.lokasi_tpn = '002' THEN a.vol ELSE 0 END as tpn2Vol,
                                              CASE WHEN a.lokasi_tpn = '601' THEN 1 ELSE 0 END as tpk57,
                                              CASE WHEN a.lokasi_tpn = '601' THEN a.vol ELSE 0 END as tpk57Vol,
                                              CASE WHEN a.lokasi_tpn = '730' THEN 1 ELSE 0 END as lkd,
                                              CASE WHEN a.lokasi_tpn = '730' THEN a.vol ELSE 0 END as lkdVol,
                                              CASE WHEN a.lokasi_tpn = '800' THEN 1 ELSE 0 END as tong,
                                              CASE WHEN a.lokasi_tpn = '800' THEN a.vol ELSE 0 END as tongVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = 'MIM' and a.tgl_input_tpn <= '$request->tgl_laporan'
                                              UNION ALL
                                              SELECT tdti.thn_produksi_tpn,
                                                   CASE WHEN tdp.to_lokasi = '002' THEN 1 ELSE 0 END as tpn2,
                                                   CASE WHEN tdp.to_lokasi = '002' THEN tdti.vol ELSE 0 END as tpn2Vol,
                                                   CASE WHEN tdp.to_lokasi = '601' THEN 1 ELSE 0 END as tpk57,
                                                   CASE WHEN tdp.to_lokasi = '601' THEN tdti.vol ELSE 0 END as tpk57Vol,
                                                   CASE WHEN tdp.to_lokasi = '730' THEN 1 ELSE 0 END as lkd,
                                                   CASE WHEN tdp.to_lokasi = '730' THEN tdti.vol ELSE 0 END as lkdVol,
                                                   CASE WHEN tdp.to_lokasi = '800' THEN 1 ELSE 0 END as tong,
                                                   CASE WHEN tdp.to_lokasi = '800' THEN tdti.vol ELSE 0 END as tongVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = 'MIM' and tdp.tgl_input <= '$request->tgl_laporan') e
                                              GROUP BY e.thn_produksi_tpn
                                        "));

        $array = json_decode(json_encode($getSel), true);   

        if($request->jnsLap == "xls")
        {
            $fileNm = "STOK KAYU ".$request->hph."-TABALAR ".$stDt.".xlsx";
            return Excel::download(new UserExport($request->hph,$request->tgl_laporan,$thnProd,$array), $fileNm);
        }else{
            return redirect()->route('rptStokKayu',[$request->hph])
                            ->with('hph', $request->hph)
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('thn_produksi', $thnProd)
                            ->with('getSel', $array);
        }
    }

    public function rptStokKayu(Request $request)
    {

        $data['title'] = 'Stok Kayu';
        return view('reporting/rptStokKayu', $data);
    }

    public static function getQtyKayuTpn($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));
        // echo $stDt;

        $getKy = TrDetailTpn::where('hph', $hph)
                            ->where('lokasi_tpn',$lok)
                            ->where('tgl_input_tpn','<=',$tgl_laporan)
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->get(['no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuTpn($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));

        $getVol = TrDetailTpn::where('hph', $hph)
                            ->where('lokasi_tpn',$lok)
                            ->where('tgl_input_tpn','<=',$tgl_laporan)
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->sum('vol');
        if($getVol > 0) {
            $decimals = 2;
            $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayu($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));
        // echo $stDt;

        $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tr_detail_position.to_lokasi',$lok)
                                // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tgl_input','<=',$tgl_laporan)
                                ->where('tr_detail_position.position','current')
                                ->get(['tr_detail_position.no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayu($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));

        $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tr_detail_position.to_lokasi',$lok)
                                // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tgl_input','<=',$tgl_laporan)
                                ->where('tr_detail_position.position','current')
                                ->sum('tdti.vol');
        if($getVol > 0) {
            $decimals = 2;
            $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayuTkg($hph,$tgl_laporan,$lokfrom,$lokto,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));
        // echo $stDt;

        $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tr_detail_position.from_lokasi',$lokfrom)
                                ->where('tr_detail_position.to_lokasi',$lokto)
                                // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tgl_input','<=',$tgl_laporan)
                                ->where('tr_detail_position.position','current')
                                ->get(['tr_detail_position.no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuTkg($hph,$tgl_laporan,$lokfrom,$lokto,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));

        $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tr_detail_position.from_lokasi',$lokfrom)
                                ->where('tr_detail_position.to_lokasi',$lokto)
                                // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tgl_input','<=',$tgl_laporan)
                                ->where('tr_detail_position.position','current')
                                ->sum('tdti.vol');
        if($getVol > 0) {
            $decimals = 2;
            $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    // ----------------------------- rptStokPerThn ----------------

    public function rptStokPerThn_rpt(Request $request)
    {   

        $stDt = date("d-m-Y", strtotime($request->tgl_laporan_d));
        $etDt = date("d-m-Y", strtotime($request->tgl_laporan_s));
        // $thnProd = date("Y", strtotime($request->thn_produksi));

        // $eDt = date("d-m-Y", strtotime($endDt));

        if($request->jnsLap == "xls")
        {
            $fileNm = "STOK KAYU ".$request->hph."-TABALAR ".$stDt." sampai ".$etDt.".xlsx";
            return Excel::download(new UserExport_1($request->hph,$request->tgl_laporan_d,$request->tgl_laporan_s,$request->thn_produksi), $fileNm);
        }else{
            return redirect()->route('rptStokPerThn',[$request->hph])
                            ->with('hph', $request->hph)
                            ->with('tgl_laporan_d', $request->tgl_laporan_d)
                            ->with('tgl_laporan_s', $request->tgl_laporan_s)
                            ->with('thn_produksi', $request->thn_produksi);
        }
    }

    public function rptStokPerThn(Request $request)
    {

        $data['title'] = 'Stok Kayu Per Tahun';
        return view('reporting/rptStokPerThn', $data);
    }

    public static function getQtyKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thnProd,$lok,$jnsKy)
    {

        $getKy = TrDetailTpn::where('hph', $hph)
                            ->where('lokasi_tpn',$lok)
                            // ->where('tgl_input_tpn','>=',$tgl_laporan_d)
                            // ->where('tgl_input_tpn','<=',$tgl_laporan_s)
                            ->whereBetween('tgl_input_tpn', [$tgl_laporan_d, $tgl_laporan_s])
                            ->where('jns_kayu',$jnsKy)
                            ->where('thn_produksi_tpn',$thnProd)
                            ->where('position','current')
                            ->get(['no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuTpnStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thnProd,$lok,$jnsKy)
    {

        $getVol = TrDetailTpn::where('hph', $hph)
                            ->where('lokasi_tpn',$lok)
                            // ->where('tgl_input_tpn','<=',$tgl_laporan)
                            ->whereBetween('tgl_input_tpn', [$tgl_laporan_d, $tgl_laporan_s])
                            ->where('jns_kayu',$jnsKy)
                            ->where('thn_produksi_tpn',$thnProd)
                            ->where('position','current')
                            ->sum('vol');
        if($getVol > 0) {
            $decimals = 2;
            $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thnProd,$lok,$jnsKy)
    {

        $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tr_detail_position.to_lokasi',$lok)
                                ->whereBetween('tr_detail_position.tgl_input', [$tgl_laporan_d, $tgl_laporan_s])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tdti.thn_produksi_tpn',$thnProd)
                                // ->where('tgl_input','<=',$tgl_laporan)
                                ->where('tr_detail_position.position','current')
                                ->get(['tr_detail_position.no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuStokPerThn($hph,$tgl_laporan_d,$tgl_laporan_s,$thnProd,$lok,$jnsKy)
    {

        $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tr_detail_position.to_lokasi',$lok)
                                ->whereBetween('tr_detail_position.tgl_input', [$tgl_laporan_d, $tgl_laporan_s])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tdti.thn_produksi_tpn',$thnProd)
                                // ->where('tgl_input','<=',$tgl_laporan)
                                ->where('tr_detail_position.position','current')
                                ->sum('tdti.vol');
        if($getVol > 0) {
            $decimals = 2;
            $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    // -------------------------------- end report Stok Per Tahun -------------------

    //------------------------Report Stok (Diameter) Per Tahun-------------------------------//

    public function rptStokPerThnDia(Request $request)
    {
        $dateNow = Carbon::now();
        $dtNow = date("Y-m-d", strtotime($dateNow));
        $data['title'] = 'Stok Kayu(Diameter) Per Tahun';
        return view('reporting/rptStokPerThnDia', $data,compact('dtNow'));
    }

    public function rptStokPerThnDia_rpt(Request $request)
    {           
        $stDt = date("d-m-Y", strtotime($request->tgl_laporan_d));
        $etDt = date("d-m-Y", strtotime($request->tgl_laporan_s));

        $getSel = DB::select(DB::raw("SELECT k.nama_kayu as namakayu,
                                            sum(e.low) as lowQty,
                                            round(sum(e.lowVol),2) as lowVol,
                                            sum(e.middle) as middleQty,
                                            round(sum(e.middleVol),2) as middleVol,
                                            sum(e.high) as highQty,
                                            round(sum(e.highVol),2) as highVol,
                                            sum(e.low)+sum(e.middle)+sum(e.high) as totalQty,
                                            round(sum(e.lowVol)+sum(e.middleVol)+sum(e.highVol),2) as totalVol
                                        FROM (SELECT a.jns_kayu,
                                              CASE WHEN a.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                              CASE WHEN a.kelas = '40-49' THEN a.vol ELSE 0 END as lowVol,
                                              CASE WHEN a.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                              CASE WHEN a.kelas = '50-59' THEN a.vol ELSE 0 END as middleVol,
                                              CASE WHEN a.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                              CASE WHEN a.kelas = '60 Up' THEN a.vol ELSE 0 END as highVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.thn_produksi_tpn = '$request->thn_produksi' and a.tgl_input_tpn >= '$request->tgl_laporan_d' and a.tgl_input_tpn <= '$request->tgl_laporan_s'
                                              UNION ALL
                                              SELECT tdti.jns_kayu as kode_kayu,
                                                   CASE WHEN tdti.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                                       CASE WHEN tdti.kelas = '40-49' THEN tdti.vol ELSE 0 END as lowVol,
                                                       CASE WHEN tdti.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                                       CASE WHEN tdti.kelas = '50-59' THEN tdti.vol ELSE 0 END as middleVol,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN tdti.vol ELSE 0 END as highVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdti.thn_produksi_tpn = '$request->thn_produksi' and tdp.tgl_input >= '$request->tgl_laporan_d' and tdp.tgl_input <= '$request->tgl_laporan_s' and tdp.to_lokasi != '800') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        GROUP BY k.nama_kayu"));

        $array = json_decode(json_encode($getSel), true);
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "STOK(Diameter) ".$request->hph."-TABALAR ".$stDt." sampai ".$etDt.".xlsx";
            return Excel::download(new UserExport_1_1($request->thn_produksi,$request->tgl_laporan_d,$request->tgl_laporan_s,$array), $fileNm);
        }else{
            
            return redirect()->route('rptStokPerThnDia',[$request->thn_produksi])
                            ->with('thn_produksi', $request->thn_produksi)
                            ->with('tgl_laporan_d', $request->tgl_laporan_d)
                            ->with('tgl_laporan_s', $request->tgl_laporan_s)
                            ->with('getSel', $array);
        }
    }

    // ---------------------------------end Stok (Diameter) Per Tahun ----------------

    public static function getQtyKayuTpnPerThn($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        $getKy = TrDetailTpn::where('hph', $hph)
                            ->where('thn_produksi_tpn',$thnProd)
                            ->where('lokasi_tpn',$lok)
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->get(['no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuTpnPerThn($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));

        $getVol = TrDetailTpn::where('hph', $hph)
                            ->where('thn_produksi_tpn',$thnProd)
                            ->where('lokasi_tpn',$lok)
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->sum('vol');
        if($getVol > 0) {
            $decimals = 2;
            $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayuPerThn($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tdti.thn_produksi_tpn',$thnProd)
                                ->where('tr_detail_position.to_lokasi',$lok)
                                // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tr_detail_position.position','current')
                                ->get(['tr_detail_position.no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuPerThn($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                ->where('tr_detail_position.hph', $hph)
                                ->where('tdti.thn_produksi_tpn',$thnProd)
                                ->where('tr_detail_position.to_lokasi',$lok)
                                // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                ->where('tdti.jns_kayu',$jnsKy)
                                ->where('tr_detail_position.position','current')
                                ->sum('tdti.vol');
        if($getVol > 0) {
            // $decimals = 2;
            // $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    //----------------------------//

    public static function getQtyKayuTpnAll($hph,$tgl_laporan,$lok,$jnsKy)
    {
        $pieces = explode("-", $lok);
        $pc1 = $pieces[0];
        $pc2 = $pieces[1];

        $getKy = TrDetailTpn::whereIn('lokasi_tpn',array($pc1, $pc2))
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->get(['no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuTpnAll($hph,$tgl_laporan,$lok,$jnsKy)
    {
        $pieces = explode("-", $lok);
        $pc1 = $pieces[0];
        $pc2 = $pieces[1];

        $getVol = TrDetailTpn::whereIn('lokasi_tpn',array($pc1, $pc2))
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->sum('vol');
        if($getVol > 0) {
            // $decimals = 2;
            // $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayuAll($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));
        // echo $stDt;
        if($lok == '609-610-611-603-605')
        {
            $pieces = explode("-", $lok);
            $pc1 = $pieces[0];
            $pc2 = $pieces[1];
            $pc3 = $pieces[2];
            $pc4 = $pieces[3];
            $pc5 = $pieces[4];

            $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->whereIn('tr_detail_position.to_lokasi',array($pc1, $pc2, $pc3, $pc4, $pc5))
                                    // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->get(['tr_detail_position.no_btg']);
        }else{
            $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tr_detail_position.to_lokasi',$lok)
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->get(['tr_detail_position.no_btg']);
        }

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuAll($hph,$tgl_laporan,$lok,$jnsKy)
    {
        // $pieces = explode("-", $tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $stDt = date("Y-m-d", strtotime($startDt));
        // $eDt = date("Y-m-d", strtotime($endDt));
        if($lok == '609-610-611-603-605')
        {
            $pieces = explode("-", $lok);
            $pc1 = $pieces[0];
            $pc2 = $pieces[1];
            $pc3 = $pieces[2];
            $pc4 = $pieces[3];
            $pc5 = $pieces[4];

            $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->whereIn('tr_detail_position.to_lokasi',array($pc1, $pc2, $pc3, $pc4, $pc5))
                                    // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->sum('tdti.vol');
        }else{
            $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tr_detail_position.to_lokasi',$lok)
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->sum('tdti.vol');
        }
        if($getVol > 0) {
            // $decimals = 2;
            // $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayuTpnPerThnAll($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        $pieces = explode("-", $lok);
        $pc1 = $pieces[0];
        $pc2 = $pieces[1];

        $getKy = TrDetailTpn::where('thn_produksi_tpn',$thnProd)
                            ->whereIn('lokasi_tpn',array($pc1, $pc2))
                            // ->whereBetween('tgl_input_tpn', [$stDt, $eDt])
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->get(['no_btg']);

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuTpnPerThnAll($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {        
        
        $pieces = explode("-", $lok);
        $pc1 = $pieces[0];
        $pc2 = $pieces[1];

        $getVol = TrDetailTpn::where('thn_produksi_tpn',$thnProd)
                            ->whereIn('lokasi_tpn',array($pc1, $pc2))
                            ->where('jns_kayu',$jnsKy)
                            ->where('position','current')
                            ->sum('vol');

        if($getVol > 0) {
            // $decimals = 2;
            // $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    public static function getQtyKayuPerThnAll($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        if($lok == '609-610-611-603-605')
        {
            $pieces = explode("-", $lok);
            $pc1 = $pieces[0];
            $pc2 = $pieces[1];
            $pc3 = $pieces[2];
            $pc4 = $pieces[3];
            $pc5 = $pieces[4];

            $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tdti.thn_produksi_tpn',$thnProd)
                                    ->whereIn('tr_detail_position.to_lokasi',array($pc1, $pc2, $pc3, $pc4, $pc5))
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->get(['tr_detail_position.no_btg']);
        }else{
            $getKy = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tdti.thn_produksi_tpn',$thnProd)
                                    ->where('tr_detail_position.to_lokasi',$lok)
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->get(['tr_detail_position.no_btg']);
        }

        if($getKy->count() > 0) {
            return count($getKy);
        }else{            
            $getKy = 0;
            return $getKy;
        }
    }

    public static function getVolKayuPerThnAll($hph,$tgl_laporan,$lok,$jnsKy,$thnProd)
    {
        if($lok == '609-610-611-603-605')
        {
            $pieces = explode("-", $lok);
            $pc1 = $pieces[0];
            $pc2 = $pieces[1];
            $pc3 = $pieces[2];
            $pc4 = $pieces[3];
            $pc5 = $pieces[4];

            $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tdti.thn_produksi_tpn',$thnProd)
                                    ->whereIn('tr_detail_position.to_lokasi',array($pc1, $pc2, $pc3, $pc4, $pc5))
                                    // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->sum('tdti.vol');
        }else{
            $getVol = TrDetailPosition::join('tr_detail_tpn_in as tdti', 'tdti.no_btg','=','tr_detail_position.no_btg')
                                    ->where('tdti.thn_produksi_tpn',$thnProd)
                                    ->where('tr_detail_position.to_lokasi',$lok)
                                    // ->whereBetween('tr_detail_position.tgl_input', [$stDt, $eDt])
                                    ->where('tdti.jns_kayu',$jnsKy)
                                    ->where('tr_detail_position.position','current')
                                    ->sum('tdti.vol');
        }
        if($getVol > 0) {
            // $decimals = 2;
            // $expo = pow(10,$decimals);
            // $number = intval($getVol*$expo)/$expo;
            $number = number_format($getVol,2, '.', '');
            return $number;
        }else{
            $number = 0;
            return $number;
        }
    }

    //------------------------Report Chainsaw Tracktor---------------------------//

    public function rptChainTrack(Request $request)
    {

        $data['title'] = 'Hasil Chainsaw - Tracktor - Kupas';
        return view('reporting/rptChainTrack', $data);
    }

    public function rptChainTrack_rpt(Request $request)
    {   
        $pieces = explode("-", $request->tgl_laporan);
        $startDt = $pieces[0];
        $endDt = $pieces[1];
        $strDt = date("Y-m-d", strtotime($startDt));
        $eDt = date("Y-m-d", strtotime($endDt));
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));

        $getSel = DB::select(DB::raw("SELECT k.nama_kayu as namakayu,
                                            sum(e.timbul) as timbulQty,
                                            round(sum(e.timbulVol),2) as timbulVol,
                                            sum(e.tenggelam) as tenggelamQty,
                                            round(sum(e.tenggelamVol),2) as tenggelamVol,
                                            sum(e.timbul)+sum(e.tenggelam) as totalQty,
                                            round(sum(e.timbulVol)+sum(e.tenggelamVol),2) as totalVol
                                        FROM (SELECT a.jns_kayu,
                                              CASE WHEN a.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                              CASE WHEN a.timbul = 'YA' THEN a.vol ELSE 0 END as timbulVol,
                                              CASE WHEN a.timbul = 'TIDAK' THEN 1 ELSE 0 END as tenggelam,
                                              CASE WHEN a.timbul = 'TIDAK' THEN a.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = '$request->hph' and a.tgl_input_tpn >= '$strDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.jns_kayu as kode_kayu,
                                                   CASE WHEN tdti.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                                       CASE WHEN tdti.timbul = 'YA' THEN tdti.vol ELSE 0 END as timbulVol,
                                                       CASE WHEN tdti.timbul = 'TIDAK' THEN 1 ELSE 0 END as tenggelam,
                                                       CASE WHEN tdti.timbul = 'TIDAK' THEN tdti.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = '$request->hph' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        GROUP BY k.nama_kayu"));

        $array = json_decode(json_encode($getSel), true);

        $getSel2 = DB::select(DB::raw("SELECT k.nama_driver as namadriver,
                                            sum(e.timbul) as timbulQty,
                                            round(sum(e.timbulVol),2) as timbulVol,
                                            sum(e.tenggelam) as tenggelamQty,
                                            round(sum(e.tenggelamVol),2) as tenggelamVol,
                                            sum(e.timbul)+sum(e.tenggelam) as totalQty,
                                            round(sum(e.timbulVol)+sum(e.tenggelamVol),2) as totalVol
                                        FROM (SELECT a.kode_driver,
                                              CASE WHEN a.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                              CASE WHEN a.timbul = 'YA' THEN a.vol ELSE 0 END as timbulVol,
                                              CASE WHEN a.timbul = 'TIDAK' THEN 1 ELSE 0 END as tenggelam,
                                              CASE WHEN a.timbul = 'TIDAK' THEN a.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = '$request->hph' and a.tgl_input_tpn >= '$strDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.kode_driver as kode_driver,
                                                   CASE WHEN tdti.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                                       CASE WHEN tdti.timbul = 'YA' THEN tdti.vol ELSE 0 END as timbulVol,
                                                       CASE WHEN tdti.timbul = 'TIDAK' THEN 1 ELSE 0 END as tenggelam,
                                                       CASE WHEN tdti.timbul = 'TIDAK' THEN tdti.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = '$request->hph' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_driver k ON e.kode_driver = k.kode_driver
                                        GROUP BY k.nama_driver"));

        $array2 = json_decode(json_encode($getSel2), true);

        $getSel3 = DB::select(DB::raw("SELECT k.nama_chainsaw as namachainsaw,
                                            sum(e.timbul) as timbulQty,
                                            round(sum(e.timbulVol),2) as timbulVol,
                                            sum(e.tenggelam) as tenggelamQty,
                                            round(sum(e.tenggelamVol),2) as tenggelamVol,
                                            sum(e.timbul)+sum(e.tenggelam) as totalQty,
                                            round(sum(e.timbulVol)+sum(e.tenggelamVol),2) as totalVol
                                        FROM (SELECT a.kode_chainsaw,
                                              CASE WHEN a.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                              CASE WHEN a.timbul = 'YA' THEN a.vol ELSE 0 END as timbulVol,
                                              CASE WHEN a.timbul = 'TIDAK' THEN 1 ELSE 0 END as tenggelam,
                                              CASE WHEN a.timbul = 'TIDAK' THEN a.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = '$request->hph' and a.tgl_input_tpn >= '$strDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.kode_chainsaw as kode_chainsaw,
                                                   CASE WHEN tdti.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                                       CASE WHEN tdti.timbul = 'YA' THEN tdti.vol ELSE 0 END as timbulVol,
                                                       CASE WHEN tdti.timbul = 'TIDAK' THEN 1 ELSE 0 END as tenggelam,
                                                       CASE WHEN tdti.timbul = 'TIDAK' THEN tdti.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = '$request->hph' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_chainsaw k ON e.kode_chainsaw = k.kode_chainsaw
                                        GROUP BY k.nama_chainsaw"));

        $array3 = json_decode(json_encode($getSel3), true);

        $getSel4 = DB::select(DB::raw("SELECT k.nama_kupas as namakupas,
                                            sum(e.timbul) as timbulQty,
                                            round(sum(e.timbulVol),2) as timbulVol,
                                            sum(e.tenggelam) as tenggelamQty,
                                            round(sum(e.tenggelamVol),2) as tenggelamVol,
                                            sum(e.timbul)+sum(e.tenggelam) as totalQty,
                                            round(sum(e.timbulVol)+sum(e.tenggelamVol),2) as totalVol
                                        FROM (SELECT a.kode_kupas,
                                              CASE WHEN a.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                              CASE WHEN a.timbul = 'YA' THEN a.vol ELSE 0 END as timbulVol,
                                              CASE WHEN a.timbul = 'TIDAK' THEN 1 ELSE 0 END as tenggelam,
                                              CASE WHEN a.timbul = 'TIDAK' THEN a.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = '$request->hph' and a.tgl_input_tpn >= '$strDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.kode_kupas as kode_kupas,
                                                   CASE WHEN tdti.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                                       CASE WHEN tdti.timbul = 'YA' THEN tdti.vol ELSE 0 END as timbulVol,
                                                       CASE WHEN tdti.timbul = 'TIDAK' THEN 1 ELSE 0 END as tenggelam,
                                                       CASE WHEN tdti.timbul = 'TIDAK' THEN tdti.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = '$request->hph' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_kupas k ON e.kode_kupas = k.kode_kupas
                                        GROUP BY k.nama_kupas"));

        $array4 = json_decode(json_encode($getSel4), true);

        $getSel5 = DB::select(DB::raw("SELECT k.nama_helper as namahelper,
                                            sum(e.timbul) as timbulQty,
                                            round(sum(e.timbulVol),2) as timbulVol,
                                            sum(e.tenggelam) as tenggelamQty,
                                            round(sum(e.tenggelamVol),2) as tenggelamVol,
                                            sum(e.timbul)+sum(e.tenggelam) as totalQty,
                                            round(sum(e.timbulVol)+sum(e.tenggelamVol),2) as totalVol
                                        FROM (SELECT a.kode_helper,
                                              CASE WHEN a.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                              CASE WHEN a.timbul = 'YA' THEN a.vol ELSE 0 END as timbulVol,
                                              CASE WHEN a.timbul = 'TIDAK' THEN 1 ELSE 0 END as tenggelam,
                                              CASE WHEN a.timbul = 'TIDAK' THEN a.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.hph = '$request->hph' and a.tgl_input_tpn >= '$strDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.kode_helper as kode_helper,
                                                   CASE WHEN tdti.timbul = 'YA' THEN 1 ELSE 0 END as timbul,
                                                       CASE WHEN tdti.timbul = 'YA' THEN tdti.vol ELSE 0 END as timbulVol,
                                                       CASE WHEN tdti.timbul = 'TIDAK' THEN 1 ELSE 0 END as tenggelam,
                                                       CASE WHEN tdti.timbul = 'TIDAK' THEN tdti.vol ELSE 0 END as tenggelamVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.hph = '$request->hph' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_helper k ON e.kode_helper = k.kode_helper
                                        GROUP BY k.nama_helper"));

        $array5 = json_decode(json_encode($getSel5), true);
                        
        if($request->jnsLap == "xls")
        {
            $fileNm = "HASIL CHAINSAW, TRAKTOR, & KUPAS PT.".$request->hph."-TABALAR ".$stDt.".xlsx";
            return Excel::download(new UserExport_2($request->hph,$request->tgl_laporan,$request->thn_produksi,$array,$array2,$array3,$array4,$array5), $fileNm);
        }else{
            
            return redirect()->route('rptChainTrack',[$request->hph])
                            ->with('hph', $request->hph)
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('thn_produksi', $request->thn_produksi)
                            ->with('getSel', $array)
                            ->with('getSel2', $array2)
                            ->with('getSel3', $array3)
                            ->with('getSel4', $array4)
                            ->with('getSel5', $array5);
        }
    }        

    //------------------------Report Loglist-------------------------------------//

    public function rptLoglistLoc(Request $request)
    {
        $data['title'] = 'Laporan Loglist';
        return view('reporting/rptLoglistLoc', $data);
    }

    public function rptLoglistLoc_rpt(Request $request)
    {   
        $pieces = explode("-", $request->tgl_laporan);
        $startDt = $pieces[0];
        $endDt = $pieces[1];
        $strDt = date("Y-m-d", strtotime($startDt));
        $eDt = date("Y-m-d", strtotime($endDt));
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));

        $lokasi = $request->lokasi;
        $s_lok_a = "a.lokasi_tpn = '".$lokasi."' and a.tgl_input_tpn >='".$strDt."' and a.tgl_input_tpn <='".$eDt."'";
        $s_lok_b = "b.to_lokasi = '".$lokasi."' and b.tgl_input >='".$strDt."' and b.tgl_input <='".$eDt."'";
        // if($lokasi == "002")
        // {
        //     $s_lok = "a.lokasi_tpn = '".$lokasi."' and a.tgl_input_tpn >='".$strDt."' and a.tgl_input_tpn <='".$eDt."'";
        // }else{
        //     $s_lok = "b.to_lokasi = '".$lokasi."' and b.tgl_input >='".$strDt."' and b.tgl_input <='".$eDt."'";
        // }

        $getSel = DB::select(DB::raw("SELECT a.*, mk.nama_kayu as mk, mc.nama_chainsaw as mc, mh.nama_helper as mh, md.nama_driver as md FROM tr_detail_tpn_in a
                                        LEFT JOIN mstr_kayu as mk ON a.jns_kayu = mk.kode_kayu
                                        LEFT JOIN mstr_chainsaw as mc ON a.kode_chainsaw = mc.kode_chainsaw 
                                        LEFT JOIN mstr_helper as mh ON a.kode_helper = mh.kode_helper
                                        LEFT JOIN mstr_driver as md ON a.kode_driver = md.kode_driver
                                        WHERE ".$s_lok_a." 
                                        UNION ALL
                                        SELECT a.*, mk.nama_kayu as mk, mc.nama_chainsaw as mc, mh.nama_helper as mh, md.nama_driver as md FROM tr_detail_tpn_in a
                                        LEFT JOIN tr_detail_position b ON b.id_detail_tpn_in = a.id_detail_tpn_in
                                        LEFT JOIN mstr_kayu as mk ON a.jns_kayu = mk.kode_kayu
                                        LEFT JOIN mstr_chainsaw as mc ON a.kode_chainsaw = mc.kode_chainsaw 
                                        LEFT JOIN mstr_helper as mh ON a.kode_helper = mh.kode_helper
                                        LEFT JOIN mstr_driver as md ON a.kode_driver = md.kode_driver
                                        WHERE ".$s_lok_b.";"));

        $array = json_decode(json_encode($getSel), true);

        $getNmLok = Lokasi::where('kode_lokasi','=',$request->lokasi)
                            ->get(['nama_lokasi']);
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "Laporan Loglist MIM-TABALAR Lokasi ".$getNmLok[0]['nama_lokasi']." ".$stDt.".xlsx";
            return Excel::download(new UserExport_3($getNmLok[0]['nama_lokasi'],$array), $fileNm);
        }else{
            
            return redirect()->route('rptLoglistLoc')
                            ->with('lokasi', $getNmLok[0]['nama_lokasi'])
                            ->with('getSel', $array);
        }
    }

    //------------------------Report Stok Lokasi---------------------------------//

    public function rptStokLoc(Request $request)
    {
        $dateNow = Carbon::now();
        $dtNow = date("Y-m-d", strtotime($dateNow));
        $data['title'] = 'Stok Per Lokasi';
        return view('reporting/rptStokLoc', $data,compact('dtNow'));
    }

    public function rptStokLoc_rpt(Request $request)
    {   
        // $pieces = explode("-", $request->tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $strDt = date("Y-m-d", strtotime($startDt));
        $eDt = date("Y-m-d", strtotime($request->tgl_laporan));
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));

        $lokasi = $request->lokasi;
        // if($lokasi == "001" OR $lokasi == "002")
        // {
        //     $s_lok = "a.lokasi_tpn = '".$lokasi."' and a.position = 'current'";
        // }else{
        //     $s_lok = "b.to_lokasi = '".$lokasi."' and b.position = 'current'";
        // }

        $getSel = DB::select(DB::raw("SELECT k.nama_kayu as namakayu,
                                            sum(e.low) as lowQty,
                                            round(sum(e.lowVol),2) as lowVol,
                                            sum(e.middle) as middleQty,
                                            round(sum(e.middleVol),2) as middleVol,
                                            sum(e.high) as highQty,
                                            round(sum(e.highVol),2) as highVol,
                                            sum(e.low)+sum(e.middle)+sum(e.high) as totalQty,
                                            round(sum(e.lowVol)+sum(e.middleVol)+sum(e.highVol),2) as totalVol
                                        FROM (SELECT a.jns_kayu,
                                              CASE WHEN a.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                              CASE WHEN a.kelas = '40-49' THEN a.vol ELSE 0 END as lowVol,
                                              CASE WHEN a.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                              CASE WHEN a.kelas = '50-59' THEN a.vol ELSE 0 END as middleVol,
                                              CASE WHEN a.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                              CASE WHEN a.kelas = '60 Up' THEN a.vol ELSE 0 END as highVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.lokasi_tpn = '$lokasi' and a.tgl_input_tpn <= '$eDt' and a.hph = 'MIM'
                                              UNION ALL
                                              SELECT tdti.jns_kayu as kode_kayu,
                                                   CASE WHEN tdti.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                                       CASE WHEN tdti.kelas = '40-49' THEN tdti.vol ELSE 0 END as lowVol,
                                                       CASE WHEN tdti.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                                       CASE WHEN tdti.kelas = '50-59' THEN tdti.vol ELSE 0 END as middleVol,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN tdti.vol ELSE 0 END as highVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.to_lokasi = '$lokasi' and tdp.tgl_input <= '$eDt' and tdp.hph = 'MIM') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        GROUP BY k.nama_kayu"));

        $array = json_decode(json_encode($getSel), true);

        $getNmLok = Lokasi::where('kode_lokasi','=',$request->lokasi)
                            ->get(['nama_lokasi']);
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "Stok Per Lokasi MIM-TABALAR ".$getNmLok[0]['nama_lokasi']." ".$stDt.".xlsx";
            return Excel::download(new UserExport_4($getNmLok[0]['nama_lokasi'],$request->tgl_laporan,$array), $fileNm);
        }else{
            
            return redirect()->route('rptStokLoc',[$request->lokasi])
                            ->with('lokasi', $getNmLok[0]['nama_lokasi'])
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('getSel', $array);
        }
    }

    //------------------------Report Stok Lokasi Detail---------------------------------//

    public function rptStokLocDet(Request $request)
    {
        $dateNow = Carbon::now();
        $dtNow = date("Y-m-d", strtotime($dateNow));
        $data['title'] = 'Stok Per Lokasi Detail';
        return view('reporting/rptStokLocDet', $data,compact('dtNow'));
    }

    public function rptStokLocDet_rpt(Request $request)
    {   
        // $pieces = explode("-", $request->tgl_laporan);
        // $startDt = $pieces[0];
        // $endDt = $pieces[1];
        // $strDt = date("Y-m-d", strtotime($startDt));
        $eDt = date("Y-m-d", strtotime($request->tgl_laporan));
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));

        $lokasi = $request->lokasi;
        if($lokasi == "002")
        {
            $s_lok = "a.hph = 'MIM' and a.position = 'current' and a.lokasi_tpn = '".$lokasi."' and a.tgl_input_tpn <='".$eDt."'";
        }else{
            $s_lok = "b.hph = 'MIM' and b.position = 'current' and b.to_lokasi = '".$lokasi."' and b.tgl_input <='".$eDt."'";
        }

        $getSel = DB::select(DB::raw("SELECT a.*, mk.nama_kayu as mk, mc.nama_chainsaw as mc, mh.nama_helper as mh, md.nama_driver as md FROM tr_detail_tpn_in a
                                        LEFT JOIN tr_detail_position b ON b.id_detail_tpn_in = a.id_detail_tpn_in
                                        LEFT JOIN mstr_kayu as mk ON a.jns_kayu = mk.kode_kayu
                                        LEFT JOIN mstr_chainsaw as mc ON a.kode_chainsaw = mc.kode_chainsaw 
                                        LEFT JOIN mstr_helper as mh ON a.kode_helper = mh.kode_helper
                                        LEFT JOIN mstr_driver as md ON a.kode_driver = md.kode_driver
                                        WHERE ".$s_lok.";"));        

        $array = json_decode(json_encode($getSel), true);

        $getNmLok = Lokasi::where('kode_lokasi','=',$request->lokasi)
                            ->get(['nama_lokasi']);
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "Stok Di Lokasi MIM-TABALAR ".$getNmLok[0]['nama_lokasi']." ".$stDt.".xlsx";
            return Excel::download(new UserExport_4_detail($getNmLok[0]['nama_lokasi'],$request->tgl_laporan,$array), $fileNm);
        }else{
            
            return redirect()->route('rptStokLocDet',[$request->lokasi])
                            ->with('lokasi', $getNmLok[0]['nama_lokasi'])
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('getSel', $array);
        }
    }

    //------------------------Report Rekap Hauling---------------------------------//

    public function rptRekapHauling(Request $request)
    {
        $dateNow = Carbon::now();
        $dtNow = date("Y-m-d", strtotime($dateNow));
        $data['title'] = 'Rekap Hauling';
        return view('reporting/rptRekapHauling', $data);
    }

    public function rptRekapHauling_rpt(Request $request)
    {   
        $pieces = explode("-", $request->tgl_laporan);
        $startDt = $pieces[0];
        $endDt = $pieces[1];
        $strDt = date("Y-m-d", strtotime($startDt));
        $eDt = date("Y-m-d", strtotime($endDt));
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));

        $lokasi = $request->lokasi;
        // if($lokasi == "001" OR $lokasi == "002")
        // {
        //     $s_lok = "a.lokasi_tpn = '".$lokasi."' and a.position = 'current'";
        // }else{
        //     $s_lok = "b.to_lokasi = '".$lokasi."' and b.position = 'current'";
        // }

        $getSel = DB::select(DB::raw("SELECT k.nama_kayu as namakayu,
                                            sum(e.low) as lowQty,
                                            round(sum(e.lowVol),2) as lowVol,
                                            sum(e.middle) as middleQty,
                                            round(sum(e.middleVol),2) as middleVol,
                                            sum(e.high) as highQty,
                                            round(sum(e.highVol),2) as highVol,
                                            sum(e.low)+sum(e.middle)+sum(e.high) as totalQty,
                                            round(sum(e.lowVol)+sum(e.middleVol)+sum(e.highVol),2) as totalVol
                                        FROM (SELECT a.jns_kayu,
                                              CASE WHEN a.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                              CASE WHEN a.kelas = '40-49' THEN a.vol ELSE 0 END as lowVol,
                                              CASE WHEN a.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                              CASE WHEN a.kelas = '50-59' THEN a.vol ELSE 0 END as middleVol,
                                              CASE WHEN a.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                              CASE WHEN a.kelas = '60 Up' THEN a.vol ELSE 0 END as highVol
                                              FROM tr_detail_tpn_in a WHERE a.hph = 'MIM' and a.lokasi_tpn = '$lokasi' and a.tgl_input_tpn >= '$strDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdti.jns_kayu as kode_kayu,
                                                   CASE WHEN tdti.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                                       CASE WHEN tdti.kelas = '40-49' THEN tdti.vol ELSE 0 END as lowVol,
                                                       CASE WHEN tdti.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                                       CASE WHEN tdti.kelas = '50-59' THEN tdti.vol ELSE 0 END as middleVol,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN tdti.vol ELSE 0 END as highVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.hph = 'MIM' and tdp.to_lokasi = '$lokasi' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        GROUP BY k.nama_kayu"));

        $array = json_decode(json_encode($getSel), true);

        $getNmLok = Lokasi::where('kode_lokasi','=',$request->lokasi)
                            ->get(['nama_lokasi']);
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "Rekap Hauling MIM-TABALAR ".$getNmLok[0]['nama_lokasi']." ".$stDt.".xlsx";
            return Excel::download(new UserExport_6($getNmLok[0]['nama_lokasi'],$request->tgl_laporan,$array), $fileNm);
        }else{
            
            return redirect()->route('rptRekapHauling',[$request->lokasi])
                            ->with('lokasi', $getNmLok[0]['nama_lokasi'])
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('getSel', $array);
        }
    }    

    //------------------------Report Rekap Tongkang--------------------------------//

    public function rptRekapTkg(Request $request)
    {
        $dateNow = Carbon::now();
        $dtNow = date("Y-m-d", strtotime($dateNow));
        $unitAlat = UnitAlat::where('kode_unit_a','>=',500)->get();
        $driver =  Driver::where('kode_driver','>=',500)->get();
        $data['title'] = 'Rekap Penerimaan Tongkang';
        return view('reporting/rptRekapTkg', $data,compact('dtNow','unitAlat'));
    }

    public function rptRekapTkg_rpt(Request $request)
    {   
        $pieces = explode("-", $request->tgl_laporan);
        $startDt = $pieces[0];
        $endDt = $pieces[1];
        $strDt = date("Y-m-d", strtotime($startDt));
        $eDt = date("Y-m-d", strtotime($endDt));
        $dateNow = Carbon::now();
        $dtNow = date("d-m-Y", strtotime($dateNow));
        $thn_prod_s = $request->thn_produksi_start;
        $thn_prod_e = $request->thn_produksi_end;

        $lokasi = $request->lokasi;

        $getSel = DB::select(DB::raw("SELECT k.nama_kayu as namakayu,
                                            sum(e.low) as lowQty,
                                            round(sum(e.lowVol),2) as lowVol,
                                            sum(e.middle) as middleQty,
                                            round(sum(e.middleVol),2) as middleVol,
                                            sum(e.high) as highQty,
                                            round(sum(e.highVol),2) as highVol,
                                            sum(e.low)+sum(e.middle)+sum(e.high) as totalQty,
                                            round(sum(e.lowVol)+sum(e.middleVol)+sum(e.highVol),2) as totalVol
                                        FROM (SELECT tdti.jns_kayu,
                                                   CASE WHEN tdti.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                                       CASE WHEN tdti.kelas = '40-49' THEN tdti.vol ELSE 0 END as lowVol,
                                                       CASE WHEN tdti.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                                       CASE WHEN tdti.kelas = '50-59' THEN tdti.vol ELSE 0 END as middleVol,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN tdti.vol ELSE 0 END as highVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg 
                                              LEFT JOIN tr_header_tpn_out thto ON tdp.id_header = thto.id_header_tpn_out 
                                              WHERE tdti.thn_produksi_tpn >= '$thn_prod_s' and tdti.thn_produksi_tpn <= '$thn_prod_e' and tdp.position = 'current' and tdp.to_lokasi = '800' and tdp.tgl_input >= '$strDt' and tdp.tgl_input <= '$eDt' and thto.kapalTongkang = '$request->muatUnit') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        GROUP BY k.nama_kayu"));

        $array = json_decode(json_encode($getSel), true);

        $getNmTkg = Driver::where('kode_driver','=',$request->muatUnit)
                            ->get(['nama_driver']);
        $nmDriver = isset($getNmTkg[0]['nama_driver']) ? $getNmTkg[0]['nama_driver'] : null;
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "Rekap Penerimaan MIM-TABALAR Tongkang (".$nmDriver.") ".$dtNow.".xlsx";
            return Excel::download(new UserExport_5($nmDriver,$strDt,$eDt,$thn_prod_s,$thn_prod_e,$array), $fileNm);
        }else{
            
            return redirect()->route('rptRekapTkg',[])
                            ->with('muatUnit', $request->muatUnit)
                            ->with('namaTkg', $nmDriver)
                            ->with('strDt', $strDt)
                            ->with('eDt', $eDt)
                            ->with('thn_prod_s', $thn_prod_s)
                            ->with('thn_prod_e', $thn_prod_e)
                            ->with('getSel', $array);
        }
    }

    //------------------------Report Rekap Perlokasi Pertahun--------------------------//

    public function rptRekapPerlokPertahun(Request $request)
    {
        $dateNow = Carbon::now();
        $dtNow = date("Y-m-d", strtotime($dateNow));
        $yearNow = date("Y", strtotime($dateNow));
        $data['title'] = 'Rekap Perlokasi Pertahun';
        return view('reporting/rptRekapPerlokPertahun', $data,compact('dtNow','yearNow'));
    }

    public function rptRekapPerlokPertahun_rpt(Request $request)
    {           
        $eDt = date("Y-m-d", strtotime($request->tgl_laporan));
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));
        $thn_prod = $request->thn_produksi;        

        $lokasi = $request->lokasi;

        $getSel = DB::select(DB::raw("SELECT v.kode_lokasi as kodelok,v.nama_lokasi as nama_lokasi, k.nama_kayu as namakayu,
                                            sum(e.low) as lowQty,
                                            round(sum(e.lowVol),2) as lowVol,
                                            sum(e.middle) as middleQty,
                                            round(sum(e.middleVol),2) as middleVol,
                                            sum(e.high) as highQty,
                                            round(sum(e.highVol),2) as highVol,
                                            sum(e.low)+sum(e.middle)+sum(e.high) as totalQty,
                                            round(sum(e.lowVol)+sum(e.middleVol)+sum(e.highVol),2) as totalVol
                                        FROM (SELECT a.lokasi_tpn as lokasiTpn, a.jns_kayu,
                                              CASE WHEN a.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                              CASE WHEN a.kelas = '40-49' THEN a.vol ELSE 0 END as lowVol,
                                              CASE WHEN a.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                              CASE WHEN a.kelas = '50-59' THEN a.vol ELSE 0 END as middleVol,
                                              CASE WHEN a.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                              CASE WHEN a.kelas = '60 Up' THEN a.vol ELSE 0 END as highVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.thn_produksi_tpn = '$thn_prod' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdp.to_lokasi as lokasiTpn, tdti.jns_kayu as kode_kayu,
                                                   CASE WHEN tdti.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                                       CASE WHEN tdti.kelas = '40-49' THEN tdti.vol ELSE 0 END as lowVol,
                                                       CASE WHEN tdti.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                                       CASE WHEN tdti.kelas = '50-59' THEN tdti.vol ELSE 0 END as middleVol,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN tdti.vol ELSE 0 END as highVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdti.thn_produksi_tpn = '$thn_prod' and tdp.tgl_input <= '$eDt' and tdp.to_lokasi != '650' and tdp.to_lokasi != '800') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        LEFT JOIN mstr_lokasi v ON e.lokasiTpn = v.kode_lokasi
                                        GROUP BY v.kode_lokasi,v.nama_lokasi,k.nama_kayu
                                        ORDER BY v.kode_lokasi ASC"));

        $array = json_decode(json_encode($getSel, JSON_PRETTY_PRINT),true);      

        $getNmLok = Lokasi::where('kode_lokasi','=',$request->lokasi)
                            ->get(['nama_lokasi']);
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "Rekap-Perlokasi-Pertahun-MIM-TABALAR-".$stDt.".xlsx";
            return Excel::download(new UserExport_8($request->tgl_laporan,$request->thn_produksi,$array), $fileNm);
        }else{
            
            return redirect()->route('rptRekapPerlokPertahun')
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('thn_produksi', $request->thn_produksi)
                            ->with('getSel', $array);
        }
    }

    public static function rptRekapPerlokPertahun_subTot($lokasi,$eDt,$yDt,$col)
    {

        $getSelSubTot = DB::select(DB::raw("SELECT v.nama_lokasi as nama_lokasi, v.kode_lokasi as kodelok,
                                            sum(e.low) as lowQty,
                                            round(sum(e.lowVol),2) as lowVol,
                                            sum(e.middle) as middleQty,
                                            round(sum(e.middleVol),2) as middleVol,
                                            sum(e.high) as highQty,
                                            round(sum(e.highVol),2) as highVol,
                                            sum(e.low)+sum(e.middle)+sum(e.high) as totalQty,
                                            round(sum(e.lowVol)+sum(e.middleVol)+sum(e.highVol),2) as totalVol
                                        FROM (SELECT a.lokasi_tpn as lokasiTpn, a.jns_kayu,
                                              CASE WHEN a.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                              CASE WHEN a.kelas = '40-49' THEN a.vol ELSE 0 END as lowVol,
                                              CASE WHEN a.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                              CASE WHEN a.kelas = '50-59' THEN a.vol ELSE 0 END as middleVol,
                                              CASE WHEN a.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                              CASE WHEN a.kelas = '60 Up' THEN a.vol ELSE 0 END as highVol
                                              FROM tr_detail_tpn_in a WHERE a.position = 'current' and a.lokasi_tpn = '$lokasi' and a.thn_produksi_tpn = '$yDt' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdp.to_lokasi as lokasiTpn, tdti.jns_kayu as kode_kayu,
                                                   CASE WHEN tdti.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                                       CASE WHEN tdti.kelas = '40-49' THEN tdti.vol ELSE 0 END as lowVol,
                                                       CASE WHEN tdti.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                                       CASE WHEN tdti.kelas = '50-59' THEN tdti.vol ELSE 0 END as middleVol,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN tdti.vol ELSE 0 END as highVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.position = 'current' and tdp.to_lokasi = '$lokasi' and tdp.tgl_input <= '$eDt' and tdti.thn_produksi_tpn = '$yDt' and tdp.to_lokasi != '650' and tdp.to_lokasi != '800') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        LEFT JOIN mstr_lokasi v ON e.lokasiTpn = v.kode_lokasi
                                        GROUP BY v.nama_lokasi,v.kode_lokasi
                                        ORDER BY v.kode_lokasi ASC"));    

        $jsonz = json_decode(json_encode($getSelSubTot), true);
        // print_r($jsonz);
        // exit();
        if($col == 'lowQty')
        {
            $newNo1 = $jsonz[0]['lowQty'] ?? 0;
        }elseif($col == 'lowVol')
        {
            $newNo1 = $jsonz[0]['lowVol'] ?? 0;
        }elseif($col == 'middleQty')
        {
            $newNo1 = $jsonz[0]['middleQty'] ?? 0;
        }elseif($col == 'middleVol')
        {
            $newNo1 = $jsonz[0]['middleVol'] ?? 0;
        }elseif($col == 'highQty')
        {
            $newNo1 = $jsonz[0]['highQty'] ?? 0;
        }elseif($col == 'highVol')
        {
            $newNo1 = $jsonz[0]['highVol'] ?? 0;
        }elseif($col == 'totalQty')
        {
            $newNo1 = $jsonz[0]['totalQty'] ?? 0;
        }elseif($col == 'totalVol')
        {
            $newNo1 = $jsonz[0]['totalVol'] ?? 0;
        }

        
        if($newNo1 > 0) {
            return $newNo1;
        }else{            
            $newNo3 = '0';
            return $newNo3;
        }        
    }


    //---------------------Report Stok Akhir Gabungan---------------------------//

    public function rptStokAkhGab(Request $request)
    {
        $dateNow = Carbon::now();
        $dtNow = date("Y-m-d", strtotime($dateNow));
        $data['title'] = 'Rekap Stok Akhir Gabungan';
        return view('reporting/rptStokAkhGab', $data,compact('dtNow'));
    }

    public function rptStokAkhGab_rpt(Request $request)
    {   
        $eDt = date("Y-m-d", strtotime($request->tgl_laporan));
        $dateNow = Carbon::now();
        $stDt = date("d-m-Y", strtotime($dateNow));

        $lokasi = $request->lokasi;

        $getSel = DB::select(DB::raw("SELECT v.kode_lokasi as kodelok,v.nama_lokasi as nama_lokasi, k.nama_kayu as namakayu,
                                            sum(e.low) as lowQty,
                                            round(sum(e.lowVol),2) as lowVol,
                                            sum(e.middle) as middleQty,
                                            round(sum(e.middleVol),2) as middleVol,
                                            sum(e.high) as highQty,
                                            round(sum(e.highVol),2) as highVol,
                                            sum(e.low)+sum(e.middle)+sum(e.high) as totalQty,
                                            round(sum(e.lowVol)+sum(e.middleVol)+sum(e.highVol),2) as totalVol
                                        FROM (SELECT a.lokasi_tpn as lokasiTpn, a.jns_kayu,
                                              CASE WHEN a.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                              CASE WHEN a.kelas = '40-49' THEN a.vol ELSE 0 END as lowVol,
                                              CASE WHEN a.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                              CASE WHEN a.kelas = '50-59' THEN a.vol ELSE 0 END as middleVol,
                                              CASE WHEN a.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                              CASE WHEN a.kelas = '60 Up' THEN a.vol ELSE 0 END as highVol
                                              FROM tr_detail_tpn_in a WHERE a.hph = 'MIM' and a.position = 'current' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdp.to_lokasi as lokasiTpn, tdti.jns_kayu as kode_kayu,
                                                   CASE WHEN tdti.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                                       CASE WHEN tdti.kelas = '40-49' THEN tdti.vol ELSE 0 END as lowVol,
                                                       CASE WHEN tdti.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                                       CASE WHEN tdti.kelas = '50-59' THEN tdti.vol ELSE 0 END as middleVol,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN tdti.vol ELSE 0 END as highVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.hph = 'MIM' and tdp.position = 'current' and tdp.tgl_input <= '$eDt' and tdp.to_lokasi != '650' and tdp.to_lokasi != '800') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        LEFT JOIN mstr_lokasi v ON e.lokasiTpn = v.kode_lokasi
                                        GROUP BY v.kode_lokasi,v.nama_lokasi,k.nama_kayu
                                        ORDER BY v.kode_lokasi ASC"));

        // $array = json_decode(json_encode($getSel), true);
        $array = json_decode(json_encode($getSel, JSON_PRETTY_PRINT),true);
        // print_r($json_string);        
        // exit();        

        $getNmLok = Lokasi::where('kode_lokasi','=',$request->lokasi)
                            ->get(['nama_lokasi']);
        
        if($request->jnsLap == "xls")
        {
            $fileNm = "Stok Akhir Gabungan MIM-TABALAR ".$stDt.".xlsx";
            return Excel::download(new UserExport_7($request->tgl_laporan,$array), $fileNm);
        }else{
            
            return redirect()->route('rptStokAkhGab')
                            ->with('tgl_laporan', $request->tgl_laporan)
                            ->with('getSel', $array);
        }
    }

    public static function rptStokAkhGab_subTot($lokasi,$eDt,$col)
    {

        $getSelSubTot = DB::select(DB::raw("SELECT v.nama_lokasi as nama_lokasi, v.kode_lokasi as kodelok,
                                            sum(e.low) as lowQty,
                                            round(sum(e.lowVol),2) as lowVol,
                                            sum(e.middle) as middleQty,
                                            round(sum(e.middleVol),2) as middleVol,
                                            sum(e.high) as highQty,
                                            round(sum(e.highVol),2) as highVol,
                                            sum(e.low)+sum(e.middle)+sum(e.high) as totalQty,
                                            round(sum(e.lowVol)+sum(e.middleVol)+sum(e.highVol),2) as totalVol
                                        FROM (SELECT a.lokasi_tpn as lokasiTpn, a.jns_kayu,
                                              CASE WHEN a.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                              CASE WHEN a.kelas = '40-49' THEN a.vol ELSE 0 END as lowVol,
                                              CASE WHEN a.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                              CASE WHEN a.kelas = '50-59' THEN a.vol ELSE 0 END as middleVol,
                                              CASE WHEN a.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                              CASE WHEN a.kelas = '60 Up' THEN a.vol ELSE 0 END as highVol
                                              FROM tr_detail_tpn_in a WHERE a.hph = 'MIM' and a.position = 'current' and a.lokasi_tpn = '$lokasi' and a.tgl_input_tpn <= '$eDt'
                                              UNION ALL
                                              SELECT tdp.to_lokasi as lokasiTpn, tdti.jns_kayu as kode_kayu,
                                                   CASE WHEN tdti.kelas = '40-49' THEN 1 ELSE 0 END as low,
                                                       CASE WHEN tdti.kelas = '40-49' THEN tdti.vol ELSE 0 END as lowVol,
                                                       CASE WHEN tdti.kelas = '50-59' THEN 1 ELSE 0 END as middle,
                                                       CASE WHEN tdti.kelas = '50-59' THEN tdti.vol ELSE 0 END as middleVol,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN 1 ELSE 0 END as high,
                                                       CASE WHEN tdti.kelas = '60 Up' THEN tdti.vol ELSE 0 END as highVol
                                              FROM tr_detail_position tdp
                                              LEFT JOIN tr_detail_tpn_in tdti ON tdp.no_btg = tdti.no_btg WHERE tdp.hph = 'MIM' and tdp.position = 'current' and tdp.to_lokasi = '$lokasi' and tdp.tgl_input <= '$eDt' and tdp.to_lokasi != '650' and tdp.to_lokasi != '800') e LEFT JOIN mstr_kayu k ON e.jns_kayu = k.kode_kayu
                                        LEFT JOIN mstr_lokasi v ON e.lokasiTpn = v.kode_lokasi
                                        GROUP BY v.nama_lokasi,v.kode_lokasi
                                        ORDER BY v.kode_lokasi ASC"));    

        $jsonz = json_decode(json_encode($getSelSubTot), true);
        // print_r($jsonz);
        // exit();
        if($col == 'lowQty')
        {
            $newNo1 = $jsonz[0]['lowQty'] ?? 0;
        }elseif($col == 'lowVol')
        {
            $newNo1 = $jsonz[0]['lowVol'] ?? 0;
        }elseif($col == 'middleQty')
        {
            $newNo1 = $jsonz[0]['middleQty'] ?? 0;
        }elseif($col == 'middleVol')
        {
            $newNo1 = $jsonz[0]['middleVol'] ?? 0;
        }elseif($col == 'highQty')
        {
            $newNo1 = $jsonz[0]['highQty'] ?? 0;
        }elseif($col == 'highVol')
        {
            $newNo1 = $jsonz[0]['highVol'] ?? 0;
        }elseif($col == 'totalQty')
        {
            $newNo1 = $jsonz[0]['totalQty'] ?? 0;
        }elseif($col == 'totalVol')
        {
            $newNo1 = $jsonz[0]['totalVol'] ?? 0;
        }

        
        if($newNo1 > 0) {
            return $newNo1;
        }else{            
            $newNo3 = '0';
            return $newNo3;
        }        
    }

    //------------ Logout -----------------------------------------------------//

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
