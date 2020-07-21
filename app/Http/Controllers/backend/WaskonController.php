<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WajibPajak;
use App\Models\WajibSpt;
use App\Models\MasterNpwp;
use App\User;
use Auth;
class WaskonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:admin');
    }

    public function indexWaskon4()
    {
        $waskon = 'Pengawasan dan Konsultasi IV';
        $data['waskon2'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.jenis_wp')
                                    ->where('users.seksi','LIKE', '%'.$waskon.'%')
                                    // ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->get();
        // $tes = User::join('master_npwp','users.nip','master_npwp.nip_pendek')
        //             ->select('users.name','users.seksi')
        //             ->where('users.seksi',)
        //             ->get();
        // dd($tes);
        return view('backend.waskon.index-waskon4',$data);
    }

    public function indexEkspen()
    {
        $waskon = 'Seksi Ekstensifikasi dan Penyuluhan';
        $data['ekspen'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.jenis_wp')
                                    ->where('users.seksi','LIKE', '%'.$waskon.'%')
                                    // ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->get();
        // $tes = User::join('master_npwp','users.nip','master_npwp.nip_pendek')
        //             ->select('users.name','users.seksi')
        //             ->where('users.seksi',)
        //             ->get();
        // dd($tes);
        return view('backend.waskon.index-ekspen',$data);
    }
}
