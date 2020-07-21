<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\WajibPajak;
use App\Models\WajibSpt;
use App\Models\MasterNpwp;
use App\Models\LaporanSpt;
use App\User;
use App\Imports\UserImport;
use App\Imports\MasterNpwpImport;
use App\Imports\MasterSptImport;
use App\Imports\DimWilayahImport;
use App\Imports\WajibSptImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
class WajibPajakController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:admin');
    }

    public function index(Request $request)
    {        
        $cari = $request->get('cari');
        $tahun = $request->get('tahun');
        if($cari){
            $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                        ->where('wajib_spt.jenis_wp','LIKE','%'.$cari.'%')
                                        ->orWhere('wajib_spt.nama_wp','LIKE','%'.$cari.'%')
                                        ->orWhere('wajib_spt.npwp','LIKE','%'.$cari.'%')
                                        ->orWhere('wajib_spt.tahun','LIKE','%'.$cari.'%')
                                        ->orWhere('master_npwp.key_npwp','LIKE','%'.$cari.'%')
                                        ->orWhere('master_npwp.kota','LIKE','%'.$cari.'%')
                                        ->orWhere('master_npwp.kelurahan','LIKE','%'.$cari.'%')
                                        ->orWhere('master_npwp.kecamatan','LIKE','%'.$cari.'%')
                                        ->orWhere('master_npwp.propinsi','LIKE','%'.$cari.'%')
                                        ->orWhere('master_npwp.nama_ar','LIKE','%'.$cari.'%')
                                        ->orWhere('master_npwp.seksi','LIKE','%'.$cari.'%')
                                        ->select('master_npwp.*','wajib_spt.id as wajib_spt_id','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','wajib_spt.npwp as wajib_npwp')
                                        ->paginate(10);
            $data['data_wp']->appends(['cari'=>$cari]);
            if($data['data_wp']->count() == 0)
            {
                return redirect()->route('wp.index')->with('error','data tidak tersedia');
            }
        }
        elseif($tahun){
            $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                        ->where('wajib_spt.tahun',$tahun)
                                        ->select('master_npwp.*','wajib_spt.id as wajib_spt_id','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','wajib_spt.npwp as wajib_npwp')
                                        ->paginate(10);
            $data['data_wp']->appends(['tahun'=>$tahun]);
            if($data['data_wp']->count() == 0)
            {
                return redirect()->route('wp.index')->with('error','data tidak tersedia');
            }
        }
        else{
        $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                        ->select('master_npwp.*','wajib_spt.id as wajib_spt_id','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','wajib_spt.npwp as wajib_npwp')
                                        ->paginate(10);
        }
        $data['total'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->select('master_npwp.*','wajib_spt.id as wajib_spt_id','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','wajib_spt.npwp as wajib_npwp')
                                    ->get()->count();
        return view('backend.wajib_pajak.kelola_wajib_pajak.index', $data);
    }
    
    public function indexSudahlapor()
    {
        $laporanspt = LaporanSpt::join('wajib_pajak','spt.npwp_wp','wajib_pajak.npwp')
                      ->where('spt.status_lapor','Sudah Lapor')
                      ->select('wajib_pajak.*','spt.*')
                      ->get();
        $data['laporan'] = $laporanspt;
        $data['tahun'] = range(date('Y'), 1990);
        return view('backend.wajib_pajak.sudah_laporSpt.index',$data);
    }
    
    public function indexBelumlapor()
    {
        $laporanspt = LaporanSpt::join('wajib_pajak','spt.npwp_wp','wajib_pajak.npwp')
                      ->where('spt.status_lapor','Belum Lapor')
                      ->select('wajib_pajak.*','spt.*')
                      ->get();
        $data['laporan'] = $laporanspt;
        $data['tahun'] = range(date('Y'), 1990);
        return view('backend.wajib_pajak.belum_laporSpt.index',$data);
    }

    public function create()
    {
        $data['tahun'] = range(date('Y'), 1990);
        return view('backend.wajib_pajak.kelola_wajib_pajak.create',$data);
    }

    public function store(Request $request)
    {
        // dd($request);
        $cek = WajibPajak::where('npwp',$request->get('npwp'))->get()->count();
        // dd($cek);
        if($cek == 1)
        {
            return redirect()->route('wp.create')->with(['error' => 'NPWP sudah terdaftar, silahkan dicek kembali']);
        }
        else {

            $new_wp = new WajibPajak;
            $new_wp->npwp = $request->get('npwp');
            $new_wp->nama = $request->get('nama');
            $new_wp->email = $request->get('email');
            $new_wp->no_hp = $request->get('no_hp');
            $new_wp->alamat = $request->get('alamat');
            $new_wp->kategori_wp = $request->get('kategori_wp');
            $new_wp->jenis_spt = $request->get('jenis_spt');
            $new_wp->tahun_pajak = $request->get('tahun_pajak');
            $new_wp->email = $request->get('email');
            $new_wp->save();
    
            $new_laporan_spt = new LaporanSpt;
            $new_laporan_spt->npwp_wp = $request->get('npwp');
            $new_laporan_spt->id_wp = $new_wp->id_wp;
            $new_laporan_spt->save();
    
            return redirect()->route('wp.index')->with(['success' => 'Data Berhasil Ditambah']);
        }
    }

    public function TambahData()
    {
        for($i = 1; $i <= 15; $i++)
        {
            $tes1 = rand(1000000000,(int) 9999999999);
            $tes2 = rand(10000,99999);
            $npwp = $tes1 . $tes2;

            $new_wp = new WajibPajak;
            $new_wp->npwp = $npwp;   
            $new_wp->nama = "User ". rand(0,100);   
            $new_wp->alamat = Str::random(20);   
            if($i % 3 == 0)
            {
                $new_wp->kategori_wp = "Orang Pribadi (Non-Karyawan)";
            }
            else if($i % 2 == 1)
            {
                $new_wp->kategori_wp = "Orang Pribadi (Karyawan)";
            }
            else if($i % 2 == 0)
            {
                $new_wp->kategori_wp = "Badan";
            }   
            $new_wp->jenis_spt= rand(1770,1780);
            $new_wp->nama_seksi = "waskon " . rand(1,4);
            $new_wp->tahun_pajak = rand(2014,2021);
            $new_wp->save();

            $new_spt = new LaporanSpt;
            $new_spt->npwp_wp = $new_wp->npwp;
            $new_spt->id_wp = $new_wp->id_wp;
            $new_spt->save();
        }
        return redirect()->route('wp.index')->with(['success' => 'Data Berhasil Ditambah']);
    }

    public function show($id)
    {
        // dd($id);
        $data['wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->where('wajib_spt.id',$id)
                                    ->select('master_npwp.*','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','wajib_spt.npwp as wajib_npwp')
                                    ->first();
        return view('backend.wajib_pajak.kelola_wajib_pajak.show',$data);
    }

    public function edit($id)
    {
        // $data['wp'] = WajibPajak::findOrFail($id);
        // $data['tahun'] = range(date('Y'), 1990);

        $data['laporan'] = WajibPajak::join('spt','wajib_pajak.npwp','spt.npwp_wp')
                                     ->where('wajib_pajak.id_wp',$id)
                                     ->select('spt.*','wajib_pajak.nama')
                                     ->first();

        return view('backend.wajib_pajak.kelola_wajib_pajak.edit',$data);
    }

    public function update(Request $request, $id)
    {
        // dd($request);

        // $wp_update = WajibPajak::where('id_wp', $id)->first();
        $wp_update = WajibPajak::findOrFail($id);
        // dd($wp_update);
        $wp_update->npwp = $request->get('npwp');
        $wp_update->nama = $request->get('nama');
        $wp_update->email = $request->get('email');
        $wp_update->no_hp = $request->get('no_hp');
        $wp_update->alamat = $request->get('alamat');
        $wp_update->kategori_wp = $request->get('kategori_wp');
        $wp_update->jenis_spt = $request->get('jenis_spt');
        $wp_update->tahun_pajak = $request->get('tahun_pajak');
        $wp_update->save();

        $laporanspt_update = LaporanSpt::where('id_wp',$id)->first();
        $laporanspt_update->npwp_wp = $request->get('npwp');
        $laporanspt_update->save();

        return redirect()->route('wp.index')->with(['success' => 'Data berhasil diperbarui']);        
    }

    public function destroy(Request $req)
    {
        // dd($req);
        $npwp = WajibPajak::where('npwp',$req->idnpwp);
        $npwp->delete();

        $npwp_wp = LaporanSpt::where('npwp_wp',$req->idnpwp);
        $npwp_wp->delete();

        return redirect()->route('wp.index')->with('deleted','Data Berhasil Dihapus !');
    }
    
    public function Import()
    {
        return view('backend.import');
    }

    public function ImportPegawai(Request $request)
    {
        $this->validate($request, [
            'import-pegawai' => 'required|mimes:csv,xls,xlsx'
        ]);
        
        $pegawai = $request->file('import-pegawai');
        // dd($pegawai);
        Excel::import(new UserImport, $pegawai);

        return redirect()->back()->with('success','Data Berhasil Di import');
    }

    
    public function ImportMasterNpwp(Request $request)
    {
        $this->validate($request, [
            'import-master-npwp' => 'required|mimes:csv,xls,xlsx'
        ]);
            
        $masternpwp = $request->file('import-master-npwp');
        // dd($masternpwp);
        Excel::import(new MasterNpwpImport, $masternpwp);

        return redirect()->back()->with('success','Data Berhasil Di import');
    }
    
    public function ImportWajibSpt(Request $request)
    {
        $this->validate($request, [
            'import-wajib-spt' => 'required|mimes:csv,xls,xlsx'
        ]);
        
        $wajibspt = $request->file('import-wajib-spt');
        // dd($wajibspt);
        Excel::import(new WajibSptImport, $wajibspt);

        return redirect()->back()->with('success','Data Berhasil Di import');
    }
    public function ImportWilayah(Request $request)
    {
        $this->validate($request, [
            'import-wilayah' => 'required|mimes:csv,xls,xlsx'
        ]);
        
        $dim_wilayah = $request->file('import-wilayah');
        // dd($dim_wilayah);
        Excel::import(new DimWilayahImport, $dim_wilayah);

        return redirect()->back()->with('success','Data Berhasil Di import');
    }

    public function ImportMasterSpt(Request $request)
    {
        $this->validate($request, [
            'import-master-spt' => 'required|mimes:csv,xls,xlsx'
        ]);
        
        $masterspt = $request->file('import-master-spt');
        // dd($masterspt);
        Excel::import(new MasterSptImport, $masterspt);

        return redirect()->back()->with('success','Data Berhasil Di import');
    }

}
