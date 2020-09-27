<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WajibPajak;
use App\Models\WajibSpt;
use App\Models\MasterNpwp;
use App\Models\TargetCapaian;
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
        $target = TargetCapaian::first();
        $data['target_capaian'] = $target;
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
        $cari = $request->get('cari');
        if($cari)
        {
            
            $data['waskon2'] = User::where('seksi','NOT LIKE', '%'.$waskon.'%')
                                   ->where('seksi','NOT LIKE', '%'.$waskon1.'%')
                                   ->where('seksi','NOT LIKE', '%'.$waskon2.'%')
                                   ->where('name','LIKE', '%'.$cari.'%')
                                   ->orderBy('name')->paginate(10);
        }
        else 
        {
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
        $target_pusat = TargetCapaian::first();
        $data['targetPusat'] = $target_pusat;
        $waskon2 = User::where('id',$id)->first();
        $data['waskon2'] = $waskon2;
        $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*','master_spt.no_tandaterima as bukti')
                                    ->where('master_npwp.nip_pendek',$waskon2->nip)
                                    ->orderBy('wajib_spt.nama_wp')->get();
        // perhitungan
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
        $data['realisasi'] = (($data['totalspt']/$data['totalwp']) * 100);
        $data['capaian'] = ((($data['totalspt']/$data['totalwp']) * 100) / $target_pusat->target) * 100;
        // dd($data['karyawan']);

        return view('backend.waskon.waskon-2.show',$data);
    }

    public function indexWaskon3(Request $request)
    {
        $waskon = 'Pengawasan dan Konsultasi III';
        $target = TargetCapaian::first();
        $data['target_capaian'] = $target;
        $data['total_waskon3'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
                                    ->get()->count();
        $data['capaian_waskon3'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();
        // dd($data['capaian_waskon3']);
        $cari = $request->get('cari');
        if($cari)
        {
            
            $data['waskon3'] = User::where('seksi','LIKE', '%'.$waskon.'%')
                                    ->where('name','LIKE','%'.$cari.'%')
                                    ->orderBy('name')
                                    ->paginate(10);
        }
        else {
            $data['waskon3'] = User::where('seksi','LIKE', '%'.$waskon.'%')
                                   ->orderBy('name')
                                   ->paginate(10);
            // $coba = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
            //                 ->select('master_npwp.*')
            //                 ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
            //                 ->get();
            // $coba1 = User::get();
            // // $coba = MasterNpwp::get();
            // foreach ($coba as $i => $item) {
            //     $varB[$i] = User::where('nip',$item->nip_pendek)->get();
            //     // $varB[$i] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
            //     //             ->select('master_npwp.nama_wp')
            //     //             ->where('master_npwp.seksi',$waskon)
            //     //             ->where('master_npwp.nip_pendek','LIKE','%'.$item->nip.'%')
            //     //             ->get();
            // }
            // $data['hasil'] = $varB;
            // dd($data['hasil']);
            // dd($coba1);
            
        }
        return view('backend.waskon.waskon-3.index',$data);
    }

    public function showWaskon3($id)
    {
        // dd($id);
        $target_pusat = TargetCapaian::first();
        $data['targetPusat'] = $target_pusat;
        $waskon3 = User::where('id',$id)->first();
        $data['waskon3'] = $waskon3;
        $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*','master_spt.no_tandaterima as bukti')
                                    ->where('master_npwp.nip_pendek',$waskon3->nip)
                                    ->orderBy('wajib_spt.nama_wp')->get();
        // perhitungan
        $data['totalwp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*')
                                    ->where('master_npwp.nip_pendek',$waskon3->nip)
                                    ->get()->count();
        
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
        $data['realisasi'] = (($data['totalspt']/$data['totalwp']) * 100);
        $data['capaian'] = ((($data['totalspt']/$data['totalwp']) * 100) / $target_pusat->target) * 100;
        // $data['realisasi'] = (1400/2235) * 100;
        // $data['capaian'] = (((1400/2235) * 100) / $target_pusat->target) * 100;
        
        // dd($data['capaian_ar']*100);
        return view('backend.waskon.waskon-3.show',$data);
    }

    public function indexWaskon4(Request $request)
    {
        $cari = $request->get('cari');
        $waskon = 'Pengawasan dan Konsultasi IV';
        $target = TargetCapaian::first();
        $data['target_capaian'] = $target;
        $data['total_waskon4'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
                                    ->get()->count();
        $data['capaian_waskon4'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();
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
        $target_pusat = TargetCapaian::first();
        $data['targetPusat'] = $target_pusat;
        $waskon4 = User::where('id',$id)->first();
        $data['waskon4'] = $waskon4;
        $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*','master_spt.no_tandaterima as bukti')
                                    ->where('master_npwp.nip_pendek',$waskon4->nip)
                                    ->orderBy('wajib_spt.nama_wp')->get();
        // perhitungan
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
        $data['realisasi'] = (($data['totalspt']/$data['totalwp']) * 100);
        $data['capaian'] = ((($data['totalspt']/$data['totalwp']) * 100) / $target_pusat->target) * 100;
        // dd($data['karyawan']);

        return view('backend.waskon.waskon-4.show',$data);
    }

    public function indexEkspen(Request $request)
    {
        $cari = $request->get('cari');
        $waskon = 'Seksi Ekstensifikasi dan Penyuluhan';
        $target = TargetCapaian::first();
        $data['target_capaian'] = $target;
        
        $data['total_ekspen'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
                                    ->get()->count();
        $data['capaian_ekspen'] =  WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.seksi','LIKE','%'.$waskon.'%')
                                    ->where('master_spt.no_tandaterima','!=',NULL)
                                    ->get()->count();
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
        $target_pusat = TargetCapaian::first();
        $data['targetPusat'] = $target_pusat;
        $ekspen = User::where('id',$id)->first();
        $data['ekspen'] = $ekspen;
        $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*','master_spt.no_tandaterima as bukti')
                                    ->where('master_npwp.nip_pendek',$ekspen->nip)
                                    ->orderBy('wajib_spt.nama_wp')->get();
        // dd($data['tes']);
        // perhitungan
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
        $data['realisasi'] = (($data['totalspt']/$data['totalwp']) * 100);
        $data['capaian'] = ((($data['totalspt']/$data['totalwp']) * 100) / $target_pusat->target) * 100;
        // dd($data['capaian_ar']);
        return view('backend.waskon.ekspen.show',$data);
    }
}
