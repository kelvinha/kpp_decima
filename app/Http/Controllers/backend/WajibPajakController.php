<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\WajibPajak;
use App\Models\WajibSpt;
use App\Models\MasterNpwp;
use App\Models\LaporanSpt;
use App\Models\LaporanImport;
use App\Models\DimWilayah;
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
        set_time_limit(8000000);
    }

    public function index(Request $request)
    {        
        $data['kecamatan'] = DimWilayah::select('kecamatan')->distinct()->get();
        // dd($request);
        $cari = $request->get('cari');
        $tahun = $request->get('tahun');
        $kecamatan = $request->get('kecamatan');
        $kelurahan = $request->get('kelurahan');
        if($cari){
            $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                        ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
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
                                        ->select('master_npwp.*','wajib_spt.id as wajib_spt_id','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','wajib_spt.npwp as wajib_npwp','master_spt.no_tandaterima','master_spt.status_spt')
                                        ->orderBy('nama_wp')->paginate(10);
            $data['data_wp']->appends(['cari'=>$cari]);
            if($data['data_wp']->count() == 0)
            {
                return redirect()->route('wp.index')->with('error',$cari);
            }
        }
        elseif($tahun){
            $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                        ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                        ->where('wajib_spt.tahun',$tahun)
                                        ->select('master_npwp.*','wajib_spt.id as wajib_spt_id','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','wajib_spt.npwp as wajib_npwp','master_spt.status_spt')
                                        ->orderBy('nama_wp')->paginate(10);
            $data['data_wp']->appends(['tahun'=>$tahun]);
            if($data['data_wp']->count() == 0)
            {
                return redirect()->route('wp.index')->with('error',$tahun);
            }
        }
        elseif($kecamatan){
            $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                        ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                        ->Where('master_npwp.kecamatan','LIKE','%'.$kecamatan.'%')
                                        // ->Where('master_npwp.kelurahan','LIKE','%'.$kelurahan.'%')
                                        ->Where('master_npwp.kelurahan',$kelurahan)
                                        ->select('master_npwp.*','wajib_spt.id as wajib_spt_id','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','wajib_spt.npwp as wajib_npwp','master_spt.no_tandaterima','master_spt.status_spt')
                                        ->orderBy('nama_wp')->paginate(10);
            // $data['data_wp']->appends(['cari'=>$cari]);
        }
        else{
        $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('master_npwp.*','wajib_spt.id as wajib_spt_id','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','wajib_spt.npwp as wajib_npwp','master_spt.no_tandaterima','master_spt.status_spt')
                                    ->orderBy('nama_wp')
                                    ->paginate(10);
        }
        $data['total'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                  ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                  ->select('master_npwp.*','wajib_spt.id as wajib_spt_id','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','wajib_spt.npwp as wajib_npwp')
                                  ->get()->count();
        return view('backend.wajib_pajak.kelola_wajib_pajak.index', $data);
    }
    
    public function jsonFilter(Request $request)
    {
      $kecamatan = $request->get('kecamatan');
      $hasil = DimWilayah::where('kecamatan',$kecamatan)->get();
      return response()->json($hasil);
    }

    public function indexSudahlapor()
    {
        $laporanspt = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                              ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                              ->orderBy('master_npwp.nama_wp', 'ASC')
                              ->get();
        $data['laporan'] = $laporanspt;
        $data['tahun'] = range(date('Y'), 1990);
        return view('backend.wajib_pajak.sudah_laporSpt.index',$data);
    }
    
    public function indexBelumlapor()
    {
        $laporanspt = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                               ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                               ->where('master_spt.no_tandaterima',null)
                               ->select('master_npwp.*','wajib_spt.tahun','master_spt.status_spt','master_spt.jenis_spt','master_spt.tgl_spt')
                               ->orderBy('master_npwp.nama_wp', 'ASC')
                               ->get();
        $data['laporan'] = $laporanspt;
        $data['tahun'] = range(date('Y'), 1990);
        return view('backend.wajib_pajak.belum_laporSpt.index',$data);
    }

    public function show($id)
    {
        $data['wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('wajib_spt.id',$id)
                                    ->select('master_npwp.*','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','master_spt.no_tandaterima','master_spt.tgl_spt','master_spt.status_spt','master_spt.jenis_spt')
                                    ->first();
        // dd($data['wp']->npwp);
        return view('backend.wajib_pajak.kelola_wajib_pajak.show',$data);
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

    
    public function ImportMasterWP(Request $request)
    {
        // dd($request);
        // $this->validate($request, [
        //     'import-master-npwp' => 'required|mimes:csv,xls,xlsx',
        //     'import-master-spt' => 'required|mimes:csv,xls,xlsx',
        //     'import-wajib-spt' => 'required|mimes:csv,xls,xlsx'
        // ]);
        if ($request->file('import-master-npwp')) {
            $masternpwp = $request->file('import-master-npwp');
            Excel::import(new MasterNpwpImport, $masternpwp);
            
        } else if($request->file('import-wajib-spt')) {
            $wajibspt = $request->file('import-wajib-spt');
            Excel::import(new WajibSptImport, $wajibspt);
            
        } else if($request->file('import-master-spt')){
            $masterspt = $request->file('import-master-spt');
            Excel::import(new MasterSptImport, $masterspt);
        }
        

        $laporan = LaporanImport::get();
        if ($laporan->count() == 0) {
            $laporan1 = new LaporanImport;
            $laporan1->nama_admin = Auth::user()->name;
            $laporan1->save();
        } else {
            $laporan1 = LaporanImport::find(1);
            $laporan1->nama_admin = Auth::user()->name;
            $laporan1->save();
        }

        // $tes = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                 // ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                 ->select('master_npwp.*','wajib_spt.id as wajib_spt_id','wajib_spt.tahun','wajib_spt.jenis_wp as wajib_jeniswp','wajib_spt.npwp as wajib_npwp')
        //                 ->get();
        // for($i=0; $i < $tes->count(); $i++)
        // {
        //     $wp_baru = new WajibPajak;
        //     $wp_baru->npwp = $tes[$i]->npwp;
        //     $wp_baru->nama = $tes[$i]->nama_wp;
        //     $wp_baru->kategori_wp = $tes[$i]->jenis_wp;
        //     $wp_baru->tahun_pajak = $tes[$i]->tahun;
        //     $wp_baru->nama_seksi = $tes[$i]->nama_ar;
        //     $wp_baru->nip_pendek = $tes[$i]->nip_pendek;
        //     $wp_baru->save();
        // }

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

}
