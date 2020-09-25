<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WajibPajak;
use App\Models\WajibSpt;
use App\Models\MasterSpt;
use App\Models\LaporanSpt;
use App\Models\DimWilayah;
use App\Models\TargetCapaian;
use App\User;
use Auth;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
   {
        $target = TargetCapaian::first();
        $data['target_capaian'] = $target;
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
        $data['kecamatan'] = DimWilayah::select('kecamatan')->distinct()->get();
       
        $data['waskon2'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','NOT LIKE','%'.$waskon.'%')
                                    ->where('master_npwp.seksi','NOT LIKE','%'.$waskon1.'%')
                                    ->where('master_npwp.seksi','NOT LIKE','%'.$waskon2.'%')
                                    ->get()->count();
        $data['waskon3'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
                                    ->get()->count();
        $data['waskon4'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon1.'%')
                                    ->get()->count();
        $data['ekspen'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon2.'%')
                                    ->get()->count();

        $data['kecil'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','cilodong')
                                    ->get()->count();
        $data['kecim'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','cimanggis')
                                    ->get()->count();
        $data['kecip'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','cipayung')
                                    ->get()->count();
        $data['kesuk'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','sukmajaya')
                                    ->get()->count();
        $data['ketap'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kecamatan','tapos')
                                    ->get()->count();
        // perhitungan
        $data['jumlahSudahLapor'] = round(((($data['totalsudahlapor'] / $data['totalwp']) *100) / $target->target) * 100, 2);
        $data['jumlahBelumLapor'] = round(((($data['totalbelumlapor'] / $data['totalwp']) *100) / $target->target) * 100, 2);
        // dd($data['jumlahBelumLapor']);

        if(Auth::user()->role === 'admin' || Auth::user()->role === 'pegawai')
        {
            return view('dashboard',$data);
        }
        else {
            return view('home');
        }
   }

   public function jsonFilter(Request $request)
   {
      $kecamatan = $request->get('kecamatan');
    //   $hasil = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
    //                     ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
    //                     ->where('master_npwp.kecamatan',$kecamatan)
    //                     ->get();
      $hasil = DimWilayah::where('kecamatan',$kecamatan)->get();
      return response()->json($hasil);
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
