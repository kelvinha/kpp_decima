<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WajibPajak;
use App\Models\WajibSpt;
use App\Models\LaporanSpt;
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
        $data['totalwp'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')->get()->count();
        $data['totalsudahlapor'] = LaporanSpt::join('wajib_pajak','spt.npwp_wp','wajib_pajak.npwp')
                            ->where('spt.status_lapor','Sudah Lapor')->get()->count();                     
        $data['totalbelumlapor'] = LaporanSpt::join('wajib_pajak','spt.npwp_wp','wajib_pajak.npwp')
                            ->where('spt.status_lapor','Belum Lapor')->get()->count();
        
        if(Auth::user()->role === 'admin' || Auth::user()->role === 'pegawai')
        {
            return view('dashboard',$data);
        }
        else {
            return view('home');
        }
   }
}
