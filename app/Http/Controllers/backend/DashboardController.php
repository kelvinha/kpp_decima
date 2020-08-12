<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WajibPajak;
use App\Models\WajibSpt;
use App\Models\MasterSpt;
use App\Models\LaporanSpt;
use App\Models\DimWilayah;
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
        $data['totaladmin'] = User::get()->count();

        $data['totalwp'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->get()->count();
        // $data['totalwp'] = WajibSpt::join('master_spt','wajib_spt.npwp','master_spt.key_npwp')->get()->count();
        // $data['totalwp'] = MasterSpt::join('master_npwp','master_spt.npwp','master_npwp.npwp')->get()->count();
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
        // dd($data['kecamatan']);
        // dd($data['totalbelumlapor']);
        
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
}
