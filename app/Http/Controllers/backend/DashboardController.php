<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\WajibPajak;
use App\Models\WajibSpt;
use App\Models\MasterSpt;
use App\Models\LaporanSpt;
use App\Models\LaporanImport;
use App\Models\DimWilayah;
use App\Models\TargetCapaian;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        set_time_limit(8000000);
    }
   
    public function index()
   {
        $target = TargetCapaian::first();
        $data['target_capaian'] = $target;
        $data['laporan_import'] = LaporanImport::first();
        $data['dashboard'] = Dashboard::first();
        if($data['dashboard'] == NULL)
        {
            $data['jumlahSudahLapor'] = 0;    
            $data['jumlahBelumLapor'] = 0;    
        }
        else {
            $data['jumlahSudahLapor'] = round(((($data['dashboard']->sudah_lapor_spt / $data['dashboard']->data_wajib_spt) *100) / $target->target) * 100, 2);
            $data['jumlahBelumLapor'] = round(((($data['dashboard']->belum_lapor_spt / $data['dashboard']->data_wajib_spt) *100) / $target->target) * 100, 2);
        }
        // $waskon = 'Pengawasan dan Konsultasi III';
        // $waskon1 = 'Pengawasan dan Konsultasi IV';
        // $waskon2 = 'Seksi Ekstensifikasi dan Penyuluhan';
        // $data['totaladmin'] = User::count();

        // $data['totalwp'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->count();
        // $data['totalsudahlapor'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                                     ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                                     ->count();                     
        // $data['totalbelumlapor'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_spt.no_tandaterima',null)
        //                             ->count();
       
        // $data['total_waskon2'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.seksi','NOT LIKE','%'.$waskon.'%')
        //                             ->where('master_npwp.seksi','NOT LIKE','%'.$waskon1.'%')
        //                             ->where('master_npwp.seksi','NOT LIKE','%'.$waskon2.'%')
        //                             ->count();
        // $data['capaian_waskon2'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.seksi','NOT LIKE','%'.$waskon.'%')
        //                             ->where('master_npwp.seksi','NOT LIKE','%'.$waskon1.'%')
        //                             ->where('master_npwp.seksi','NOT LIKE','%'.$waskon2.'%')
        //                             ->where('master_spt.no_tandaterima','!=',NULL)
        //                             ->count();

        // $data['total_waskon3'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
        //                             ->count();
        // $data['capaian_waskon3'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
        //                             ->where('master_spt.no_tandaterima','!=',NULL)
        //                             ->count();

        // $data['total_waskon4'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.seksi','LIKE','%'.$waskon1.'%')
        //                             ->count();
        // $data['capaian_waskon4'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.seksi','LIKE','%'.$waskon1.'%')
        //                             ->where('master_spt.no_tandaterima','!=',NULL)
        //                             ->count();

        // $data['total_ekspen'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.seksi','LIKE','%'.$waskon2.'%')
        //                             ->count();
        // $data['capaian_ekspen'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.seksi','LIKE','%'.$waskon2.'%')
        //                             ->where('master_spt.no_tandaterima','!=',NULL)
        //                             ->count();

        // $data['total_kecil'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.kecamatan','cilodong')
        //                             ->count();
        // $data['capaian_kecil'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.kecamatan','cilodong')
        //                             ->where('master_spt.no_tandaterima','!=',NULL)
        //                             ->count();

        // $data['total_kecim'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.kecamatan','cimanggis')
        //                             ->count();
        // $data['capaian_kecim'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.kecamatan','cimanggis')
        //                             ->where('master_spt.no_tandaterima','!=',NULL)
        //                             ->count();

        // $data['total_kecip'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.kecamatan','cipayung')
        //                             ->count();
        // $data['capaian_kecip'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.kecamatan','cipayung')
        //                             ->where('master_spt.no_tandaterima','!=',NULL)
        //                             ->count();

        // $data['total_kesuk'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.kecamatan','sukmajaya')
        //                             ->count();
        // $data['capaian_kesuk'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.kecamatan','sukmajaya')
        //                             ->where('master_spt.no_tandaterima','!=',NULL)
        //                             ->count();

        // $data['total_ketap'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.kecamatan','tapos')
        //                             ->count();
        // $data['capaian_ketap'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
        //                             ->where('master_npwp.kecamatan','tapos')
        //                             ->where('master_spt.no_tandaterima','!=',NULL)
        //                             ->count();
        // // perhitungan
        // if ($data['totalwp'] == 0) {
        //     $data['jumlahSudahLapor'] = 0; $data['totalSudahLapor'] = 0;    
        //     $data['jumlahBelumLapor'] = 0; $data['totalBelumLapor'] = 0;    
        // } else {
        //     $data['jumlahSudahLapor'] = round(((($data['totalsudahlapor'] / $data['totalwp']) *100) / $target->target) * 100, 2);
        //     $data['jumlahBelumLapor'] = round(((($data['totalbelumlapor'] / $data['totalwp']) *100) / $target->target) * 100, 2);
        // }
        
        // dd($data['jumlahBelumLapor']);

        if(Auth::user()->role === 'admin' || Auth::user()->role === 'pegawai')
        {
            return view('dashboard1',$data);
        }
        else {
            return view('home');
        }
   }

   public function createTarget(Request $request)
   {
    //    dd($request);
       $new_target = new TargetCapaian;
       $new_target->target = $request->get('target');
       $new_target->save();

       return redirect()->back();
   }

   public function updateTarget(Request $request)
   {
    //    dd($request);
       $update_target = TargetCapaian::where('id', $request->get('idtarget'))->first();
       $update_target->target = $request->get('target');
       $update_target->save();

       return redirect()->back();
   }

   public function refresh()
   {
    $target = TargetCapaian::first();
    $waskon = 'Pengawasan dan Konsultasi III';
    $waskon1 = 'Pengawasan dan Konsultasi IV';
    $waskon2 = 'Seksi Ekstensifikasi dan Penyuluhan';
    $totalar = User::count();

    $totalwp =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->count();
    $totalsudahlapor = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                        ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                        ->count();                     
    $totalbelumlapor = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_spt.no_tandaterima',null)
                                ->count();
    $total_waskon2 =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.seksi','NOT LIKE','%'.$waskon.'%')
                                ->where('master_npwp.seksi','NOT LIKE','%'.$waskon1.'%')
                                ->where('master_npwp.seksi','NOT LIKE','%'.$waskon2.'%')
                                ->count();

    $capaian_waskon2 =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.seksi','NOT LIKE','%'.$waskon.'%')
                                ->where('master_npwp.seksi','NOT LIKE','%'.$waskon1.'%')
                                ->where('master_npwp.seksi','NOT LIKE','%'.$waskon2.'%')
                                ->where('master_spt.no_tandaterima','!=',NULL)
                                ->count();

    $total_waskon3 =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
                                ->count();
    $capaian_waskon3 =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
                                ->where('master_spt.no_tandaterima','!=',NULL)
                                ->count();

    $total_waskon4 =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.seksi','LIKE','%'.$waskon1.'%')
                                ->count();
    $capaian_waskon4 =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.seksi','LIKE','%'.$waskon1.'%')
                                ->where('master_spt.no_tandaterima','!=',NULL)
                                ->count();

    $total_ekspen =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.seksi','LIKE','%'.$waskon2.'%')
                                ->count();
    $capaian_ekspen =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.seksi','LIKE','%'.$waskon2.'%')
                                ->where('master_spt.no_tandaterima','!=',NULL)
                                ->count();

    $total_kecil =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.kecamatan','cilodong')
                                ->count();
    $capaian_kecil =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.kecamatan','cilodong')
                                ->where('master_spt.no_tandaterima','!=',NULL)
                                ->count();

    $total_kecim =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.kecamatan','cimanggis')
                                ->count();
    $capaian_kecim =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.kecamatan','cimanggis')
                                ->where('master_spt.no_tandaterima','!=',NULL)
                                ->count();

    $total_kecip =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.kecamatan','cipayung')
                                ->count();
    $capaian_kecip =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.kecamatan','cipayung')
                                ->where('master_spt.no_tandaterima','!=',NULL)
                                ->count();

    $total_kesuk =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.kecamatan','sukmajaya')
                                ->count();
    $capaian_kesuk =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.kecamatan','sukmajaya')
                                ->where('master_spt.no_tandaterima','!=',NULL)
                                ->count();

    $total_ketap =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.kecamatan','tapos')
                                ->count();
    $capaian_ketap =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->where('master_npwp.kecamatan','tapos')
                                ->where('master_spt.no_tandaterima','!=',NULL)
                                ->count();
     // if ($data['totalwp'] == 0) {
        //     $data['jumlahSudahLapor'] = 0; $data['totalSudahLapor'] = 0;    
        //     $data['jumlahBelumLapor'] = 0; $data['totalBelumLapor'] = 0;    
        // } else {
        //     $data['jumlahSudahLapor'] = round(((($data['totalsudahlapor'] / $data['totalwp']) *100) / $target->target) * 100, 2);
        //     $data['jumlahBelumLapor'] = round(((($data['totalbelumlapor'] / $data['totalwp']) *100) / $target->target) * 100, 2);
        // }
    // dd(Dashboard::count());
    DB::table('tabel_dashboard')->truncate();
    $new_dashboard = new Dashboard;
    $new_dashboard->jumlah_ar = $totalar;
    $new_dashboard->data_wajib_spt = $totalwp;
    $new_dashboard->sudah_lapor_spt = $totalsudahlapor;
    $new_dashboard->belum_lapor_spt = $totalbelumlapor;
    $new_dashboard->waskon2 = $total_waskon2;
    $new_dashboard->cap_waskon2 = $capaian_waskon2;
    $new_dashboard->waskon3 = $total_waskon3;
    $new_dashboard->cap_waskon3 = $capaian_waskon3;
    $new_dashboard->waskon4 = $total_waskon4;
    $new_dashboard->cap_waskon4 = $capaian_waskon4;
    $new_dashboard->ekspen = $total_ekspen;
    $new_dashboard->cap_ekspen = $capaian_ekspen;
    $new_dashboard->kecil = $total_kecil;
    $new_dashboard->cap_kecil = $capaian_kecil;
    $new_dashboard->kecim = $total_kecim;
    $new_dashboard->cap_kecim = $capaian_kecim;
    $new_dashboard->kecip = $total_kecip;
    $new_dashboard->cap_kecip = $capaian_kecip;
    $new_dashboard->kesuk = $total_kesuk;
    $new_dashboard->cap_kesuk = $capaian_kesuk;
    $new_dashboard->ketap = $total_ketap;
    $new_dashboard->cap_ketap = $capaian_ketap;
    $new_dashboard->save();
    
    DB::table('laporan_import')->truncate();
    $laporan1 = new LaporanImport;
    $laporan1->nama_admin = Auth::user()->name;
    $laporan1->save();

    return redirect()->route('dashboard');
    // return Dashboard::get();
   }
}
