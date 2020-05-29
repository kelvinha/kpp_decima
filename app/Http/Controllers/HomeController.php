<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WajibPajak;
use App\Models\LaporanSpt;
use App\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['totaladmin'] = User::get()->count();
        $data['totalwp'] = WajibPajak::get()->count();
        $data['totalsudahlapor'] = LaporanSpt::join('wajib_pajak','spt.npwp_wp','wajib_pajak.npwp')
                            ->where('spt.status_lapor','Sudah Lapor')
                            ->select('wajib_pajak.*','spt.*')
                            ->get()
                            ->count();
                            
        $data['totalbelumlapor'] = LaporanSpt::join('wajib_pajak','spt.npwp_wp','wajib_pajak.npwp')
                            ->where('spt.status_lapor','Belum Lapor')
                            ->select('wajib_pajak.*','spt.*')
                            ->get()
                            ->count();
        
        if(Auth::user()->role === 'admin' || Auth::user()->role === 'pegawai')
        {
            return view('dashboard',$data);
        }
        else {
            return view('home');
        }
    }
}
