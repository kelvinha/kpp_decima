<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WajibPajak;
use App\Models\WajibSpt;
use App\Models\MasterSpt;
use App\Models\LaporanSpt;
use App\Models\LaporanImport;
use App\Models\DimWilayah;
use App\Models\TargetCapaian;
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
        $waskon = 'Pengawasan dan Konsultasi III';
        $waskon1 = 'Pengawasan dan Konsultasi IV';
        $waskon2 = 'Seksi Ekstensifikasi dan Penyuluhan';
        $data['totaladmin'] = User::get()->count();

        $data['totalwp'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->get()->count();
        $data['totalsudahlapor'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                            ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                            ->get()
                                            ->count();                     
        $data['totalbelumlapor'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_spt.no_tandaterima',null)
                                    ->get()
                                    ->count();
       
        $data['total_waskon2'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','NOT LIKE','%'.$waskon.'%')
                                    ->where('master_npwp.seksi','NOT LIKE','%'.$waskon1.'%')
                                    ->where('master_npwp.seksi','NOT LIKE','%'.$waskon2.'%')
                                    ->get()->count();
        $data['capaian_waskon2'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','NOT LIKE','%'.$waskon.'%')
                                    ->where('master_npwp.seksi','NOT LIKE','%'.$waskon1.'%')
                                    ->where('master_npwp.seksi','NOT LIKE','%'.$waskon2.'%')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();

        $data['total_waskon3'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
                                    ->get()->count();
        $data['capaian_waskon3'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();

        $data['total_waskon4'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon1.'%')
                                    ->get()->count();
        $data['capaian_waskon4'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon1.'%')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();

        $data['total_ekspen'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon2.'%')
                                    ->get()->count();
        $data['capaian_ekspen'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon2.'%')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();

        $data['total_kecil'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','cilodong')
                                    ->get()->count();
        $data['capaian_kecil'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','cilodong')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();

        $data['total_kecim'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','cimanggis')
                                    ->get()->count();
        $data['capaian_kecim'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','cimanggis')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();

        $data['total_kecip'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','cipayung')
                                    ->get()->count();
        $data['capaian_kecip'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','cipayung')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();

        $data['total_kesuk'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','sukmajaya')
                                    ->get()->count();
        $data['capaian_kesuk'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','sukmajaya')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();

        $data['total_ketap'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','tapos')
                                    ->get()->count();
        $data['capaian_ketap'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','tapos')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();
        // perhitungan
        if ($data['totalwp'] == 0) {
            $data['jumlahSudahLapor'] = 0; $data['totalSudahLapor'] = 0;    
            $data['jumlahBelumLapor'] = 0; $data['totalBelumLapor'] = 0;    
        } else {
            $data['jumlahSudahLapor'] = round(((($data['totalsudahlapor'] / $data['totalwp']) *100) / $target->target) * 100, 2);
            $data['jumlahBelumLapor'] = round(((($data['totalbelumlapor'] / $data['totalwp']) *100) / $target->target) * 100, 2);
        }
        
        // dd($data['jumlahBelumLapor']);

        if(Auth::user()->role === 'admin' || Auth::user()->role === 'pegawai')
        {
            return view('dashboard',$data);
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
}
