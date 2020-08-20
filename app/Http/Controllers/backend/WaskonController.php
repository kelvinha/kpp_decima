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

    public function indexWaskon2(Request $request)
    {
        $waskon = 'Pengawasan dan Konsultasi III';
        $waskon1 = 'Pengawasan dan Konsultasi IV';
        $waskon2 = 'Seksi Ekstensifikasi dan Penyuluhan';
        $cari = $request->get('cari');
        if($cari)
        {
            // $data['waskon2'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
            //                         ->join('users','master_npwp.nip_pendek','users.nip')
            //                         ->select('users.*','wajib_spt.*')
            //                         ->where('users.seksi','NOT LIKE', '%'.$waskon.'%')
            //                         ->where('users.seksi','NOT LIKE', '%'.$waskon1.'%')
            //                         ->where('users.seksi','NOT LIKE', '%'.$waskon2.'%')
            //                         ->where('users.name','LIKE','%'.$cari.'%')
            //                         ->paginate(10);
            $data['waskon2'] = User::where('seksi','NOT LIKE', '%'.$waskon.'%')
                                   ->where('seksi','NOT LIKE', '%'.$waskon1.'%')
                                   ->where('seksi','NOT LIKE', '%'.$waskon2.'%')
                                   ->where('name','LIKE', '%'.$cari.'%')
                                   ->orderBy('name')->paginate(10);
        }
        else 
        {
            // $data['waskon2'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
            //                             ->join('users','master_npwp.nip_pendek','users.nip')
            //                             ->select('users.*','wajib_spt.*')
            //                             ->where('users.seksi','NOT LIKE', '%'.$waskon.'%')
            //                             ->where('users.seksi','NOT LIKE', '%'.$waskon1.'%')
            //                             ->where('users.seksi','NOT LIKE', '%'.$waskon2.'%')
            //                             ->paginate(10);
            $data['waskon2'] = User::where('seksi','NOT LIKE', '%'.$waskon.'%')
                                   ->where('seksi','NOT LIKE', '%'.$waskon1.'%')
                                   ->where('seksi','NOT LIKE', '%'.$waskon2.'%')
                                   ->orderBy('name')->paginate(10);
        }
        // dd($data['total']);
        return view('backend.waskon.waskon-2.index',$data);
    }

    public function showWaskon2($id)
    {
        // dd($id);
        $waskon2 = User::where('id',$id)->first();
        $data['waskon2'] = $waskon2;
        $data['karyawan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon2->nip)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->get();
        $data['nonkaryawan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon2->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->get();
        $data['badan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon2->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->get();
        $data['totalwp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon2->nip)
                                    ->get()->count();
        $data['totalspt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon2->nip)
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['karSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon2->nip)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['nonkarSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon2->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['bdnSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon2->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['capaian_ar'] = (($data['totalspt']/$data['totalwp']));
        // dd($data['karyawan']);

        return view('backend.waskon.waskon-2.show',$data);
    }

    public function indexWaskon3(Request $request)
    {
        $waskon = 'Pengawasan dan Konsultasi III';
        $cari = $request->get('cari');
        if($cari)
        {
            // $data['waskon3'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
            //                         ->join('users','master_npwp.nip_pendek','users.nip')
            //                         ->select('users.*','wajib_spt.jenis_wp')
            //                         ->where('users.seksi','LIKE', '%'.$waskon.'%')
            //                         ->where('users.name','LIKE', '%'.$cari.'%')
            //                         ->paginate(10);
            $data['waskon3'] = User::where('seksi','LIKE', '%'.$waskon.'%')
                                    ->where('name','LIKE','%'.$cari.'%')
                                    ->orderBy('name')
                                    ->paginate(10);
        }
        else {
            // $data['waskon3'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
            //                             ->join('users','master_npwp.nip_pendek','users.nip')
            //                             ->select('users.*','wajib_spt.jenis_wp')
            //                             ->where('users.seksi','LIKE', '%'.$waskon.'%')
            //                             ->paginate(10);
            $data['waskon3'] = User::where('seksi','LIKE', '%'.$waskon.'%')
                                   ->orderBy('name')
                                   ->paginate(10);
            // dd($tes);
        }
        return view('backend.waskon.waskon-3.index',$data);
    }

    public function showWaskon3($id)
    {
        // dd($id);
        $waskon3 = User::where('id',$id)->first();
        $data['waskon3'] = $waskon3;
        $data['karyawan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon3->nip)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->get();
        $data['nonkaryawan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon3->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->get();
        $data['badan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon3->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->get();
        $data['totalwp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon3->nip)
                                    ->get()->count();
        // perhitungan
        $data['totalspt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon3->nip)
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['karSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon3->nip)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['nonkarSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon3->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['bdnSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon3->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['capaian_ar'] = (($data['totalspt']/$data['totalwp']));
        
        // dd($data['capaian_ar']*100);
        return view('backend.waskon.waskon-3.show',$data);
    }

    public function indexWaskon4(Request $request)
    {
        $cari = $request->get('cari');
        $waskon = 'Pengawasan dan Konsultasi IV';
        if($cari)
        {
            
            $data['waskon4'] = User::where('seksi','LIKE', '%'.$waskon.'%')
                                    ->where('name','LIKE','%'.$cari.'%')
                                    ->orderBy('name')
                                    ->paginate(10);
        }
        else 
        {
            $data['waskon4'] = User::where('seksi','LIKE', '%'.$waskon.'%')
                                   ->orderBy('name')
                                   ->paginate(10);
            // $data['waskon4'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
            //                             ->join('users','master_npwp.nip_pendek','users.nip')
            //                             ->select('users.*','wajib_spt.jenis_wp','wajib_spt.nama_wp')
            //                             ->where('users.seksi','LIKE', '%'.$waskon.'%')
            //                             ->paginate(10);
            // dd($tes);
        }
        return view('backend.waskon.waskon-4.index',$data);
    }

    public function showWaskon4($id)
    {
        // dd($id);
        $waskon4 = User::where('id',$id)->first();
        $data['waskon4'] = $waskon4;
        $data['karyawan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon4->nip)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->get();
        $data['nonkaryawan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon4->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->get();
        $data['badan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon4->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->get();
        $data['totalwp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon4->nip)
                                    ->get()->count();

        $data['totalspt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon4->nip)
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['karSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon4->nip)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['nonkarSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon4->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['bdnSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->select('wajib_spt.*','master_spt.pembetulan')
                                    ->where('master_npwp.nip_pendek',$waskon4->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['capaian_ar'] = (($data['totalspt']/$data['totalwp']));
        // dd($data['karyawan']);

        return view('backend.waskon.waskon-4.show',$data);
    }

    public function indexEkspen(Request $request)
    {
        $cari = $request->get('cari');
        $waskon = 'Seksi Ekstensifikasi dan Penyuluhan';
        if($cari)
        {
            $data['ekspen'] = User::where('seksi','LIKE', '%'.$waskon.'%')
                                  ->where('name','LIKE','%'.$cari.'%')
                                  ->orderBy('name')->paginate(10);
        }
        else {
            $data['ekspen'] = User::where('seksi','LIKE', '%'.$waskon.'%')
                                  ->orderBy('name')
                                  ->paginate(10);
        }
        // $data['ekspen'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
        //                             ->join('users','master_npwp.nip_pendek','users.nip')
        //                             ->select('users.*','wajib_spt.jenis_wp')
        //                             ->where('users.seksi','LIKE', '%'.$waskon.'%')
        //                             ->paginate(10);
        // dd($tes);
        return view('backend.waskon.ekspen.index',$data);
    }

    public function showEkspen($id)
    {
        // dd($id);
        $ekspen = User::where('id',$id)->first();
        $data['ekspen'] = $ekspen;
        $data['karyawan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$ekspen->nip)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->get();
        $data['nonkaryawan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$ekspen->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->get();
        $data['badan'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$ekspen->nip)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->get();
        // dd($data['tes']);
        $data['totalwp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->join('users','master_npwp.nip_pendek','users.nip')
                                ->select('users.*','wajib_spt.*')
                                ->where('master_npwp.nip_pendek',$ekspen->nip)
                                ->get()->count();
        $data['totalspt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->select('wajib_spt.*','master_spt.pembetulan')
                                ->where('master_npwp.nip_pendek',$ekspen->nip)
                                ->where('master_spt.pembetulan','>=',0)
                                ->get()->count();
        $data['karSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->select('wajib_spt.*','master_spt.pembetulan')
                                ->where('master_npwp.nip_pendek',$ekspen->nip)
                                ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                ->where('master_spt.pembetulan','>=',0)
                                ->get()->count();
        $data['nonkarSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->select('wajib_spt.*','master_spt.pembetulan')
                                ->where('master_npwp.nip_pendek',$ekspen->nip)
                                ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                ->where('master_spt.pembetulan','>=',0)
                                ->get()->count();
        $data['bdnSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                ->select('wajib_spt.*','master_spt.pembetulan')
                                ->where('master_npwp.nip_pendek',$ekspen->nip)
                                ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                ->where('master_spt.pembetulan','>=',0)
                                ->get()->count();
        $data['capaian_ar'] = ($data['totalspt']/$data['totalwp']);
        // dd($data['capaian_ar']);
        return view('backend.waskon.ekspen.show',$data);
    }
}
