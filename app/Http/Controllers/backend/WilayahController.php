<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WajibPajak;
use App\Models\WajibSpt;
use App\Models\MasterNpwp;
use App\Models\TargetCapaian;
use App\Models\DimWilayah;
use App\User;
use Auth;

class WilayahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:admin');
    }

    public function indexCilodong(Request $request)
    {
        $kecamatan = 'cilodong';
        $cari = $request->get('cari');
        if($cari){

            $data['wilayah'] = DimWilayah::where('kecamatan','LIKE','%'.$kecamatan.'%')
                                         ->where('kelurahan','LIKE','%'.$cari.'%')
                                         ->orderBy('kelurahan','asc')
                                         ->paginate(10);
        }
        else {
            $data['wilayah'] = DimWilayah::where('kecamatan','LIKE','%'.$kecamatan.'%')
                                         ->orderBy('kelurahan','asc')
                                         ->paginate(10);
        }

        return view('backend.wilayah.kec_cilodong.index',$data);
    }

    public function showCilodong($id)
    {
        $target_pusat = TargetCapaian::first();
        $data['targetPusat'] = $target_pusat;
        $wilayah = DimWilayah::where('id',$id)->first();
        $data['wilayah'] = $wilayah;
        $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*','master_spt.no_tandaterima as bukti')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->orderBy('wajib_spt.nama_wp')->get();
        // perhitungan
        $data['totalwp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->get()->count();
        $data['totalspt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['karSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['nonkarSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['bdnSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['realisasi'] = (($data['totalspt']/$data['totalwp']) * 100);
        $data['capaian'] = ((($data['totalspt']/$data['totalwp']) * 100) / $target_pusat->target) * 100;

        return view('backend.wilayah.kec_cilodong.show',$data);
    }

    public function indexCimanggis(Request $request)
    {
        $kecamatan = 'cimanggis';
        $cari = $request->get('cari');
        if($cari){

            $data['wilayah'] = DimWilayah::where('kecamatan','LIKE','%'.$kecamatan.'%')
                                         ->where('kelurahan','LIKE','%'.$cari.'%')
                                         ->orderBy('kelurahan','asc')
                                         ->paginate(10);
        }
        else {
            $data['wilayah'] = DimWilayah::where('kecamatan','LIKE','%'.$kecamatan.'%')
                                         ->orderBy('kelurahan','asc')
                                         ->paginate(10);
        }

        return view('backend.wilayah.kec_cimanggis.index',$data);
    }

    public function showCimanggis($id)
    {
        $target_pusat = TargetCapaian::first();
        $data['targetPusat'] = $target_pusat;
        $wilayah = DimWilayah::where('id',$id)->first();
        $data['wilayah'] = $wilayah;
        $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*','master_spt.no_tandaterima as bukti')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->orderBy('wajib_spt.nama_wp')->get();
        // dd($data['data_wp']);
        // perhitungan
        $data['totalwp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->get()->count();
        $data['totalspt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['karSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['nonkarSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['bdnSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['realisasi'] = (($data['totalspt']/$data['totalwp']) * 100);
        $data['capaian'] = ((($data['totalspt']/$data['totalwp']) * 100) / $target_pusat->target) * 100;

        return view('backend.wilayah.kec_cimanggis.show',$data);
    }

    public function indexCipayung(Request $request)
    {
        $kecamatan = 'cipayung';
        $cari = $request->get('cari');
        if($cari){

            $data['wilayah'] = DimWilayah::where('kecamatan','LIKE','%'.$kecamatan.'%')
                                         ->where('kelurahan','LIKE','%'.$cari.'%')
                                         ->orderBy('kelurahan','asc')
                                         ->paginate(10);
        }
        else {
            $data['wilayah'] = DimWilayah::where('kecamatan','LIKE','%'.$kecamatan.'%')
                                         ->orderBy('kelurahan','asc')
                                         ->paginate(10);
        }

        return view('backend.wilayah.kec_cipayung.index',$data);
    }

    public function showCipayung($id)
    {
        $target_pusat = TargetCapaian::first();
        $data['targetPusat'] = $target_pusat;
        $wilayah = DimWilayah::where('id',$id)->first();
        $data['wilayah'] = $wilayah;
        $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*','master_spt.no_tandaterima as bukti')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->orderBy('wajib_spt.nama_wp')->get();
        // dd($data['data_wp']);
        // perhitungan
        $data['totalwp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->get()->count();
        $data['totalspt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['karSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['nonkarSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['bdnSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['realisasi'] = (($data['totalspt']/$data['totalwp']) * 100);
        $data['capaian'] = ((($data['totalspt']/$data['totalwp']) * 100) / $target_pusat->target) * 100;

        return view('backend.wilayah.kec_cipayung.show',$data);
    }

    public function indexSukmajaya(Request $request)
    {
        $kecamatan = 'sukmajaya';
        $cari = $request->get('cari');
        if($cari){

            $data['wilayah'] = DimWilayah::where('kecamatan','LIKE','%'.$kecamatan.'%')
                                         ->where('kelurahan','LIKE','%'.$cari.'%')
                                         ->orderBy('kelurahan','asc')
                                         ->paginate(10);
        }
        else {
            $data['wilayah'] = DimWilayah::where('kecamatan','LIKE','%'.$kecamatan.'%')
                                         ->orderBy('kelurahan','asc')
                                         ->paginate(10);
        }

        return view('backend.wilayah.kec_sukmajaya.index',$data);
    }

    public function showSukmajaya($id)
    {
        $target_pusat = TargetCapaian::first();
        $data['targetPusat'] = $target_pusat;
        $wilayah = DimWilayah::where('id',$id)->first();
        $data['wilayah'] = $wilayah;
        $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*','master_spt.no_tandaterima as bukti')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->orderBy('wajib_spt.nama_wp')->get();
        // dd($data['data_wp']);
        // perhitungan
        $data['totalwp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->get()->count();
        $data['totalspt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['karSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['nonkarSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['bdnSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['realisasi'] = (($data['totalspt']/$data['totalwp']) * 100);
        $data['capaian'] = ((($data['totalspt']/$data['totalwp']) * 100) / $target_pusat->target) * 100;

        return view('backend.wilayah.kec_sukmajaya.show',$data);
    }

    public function indexTapos(Request $request)
    {
        $kecamatan = 'tapos';
        $cari = $request->get('cari');
        if($cari){

            $data['wilayah'] = DimWilayah::where('kecamatan','LIKE','%'.$kecamatan.'%')
                                         ->where('kelurahan','LIKE','%'.$cari.'%')
                                         ->orderBy('kelurahan','asc')
                                         ->paginate(10);
        }
        else {
            $data['wilayah'] = DimWilayah::where('kecamatan','LIKE','%'.$kecamatan.'%')
                                         ->orderBy('kelurahan','asc')
                                         ->paginate(10);
        }

        return view('backend.wilayah.kec_tapos.index',$data);
    }
    public function showTapos($id)
    {
        $target_pusat = TargetCapaian::first();
        $data['targetPusat'] = $target_pusat;
        $wilayah = DimWilayah::where('id',$id)->first();
        $data['wilayah'] = $wilayah;
        $data['data_wp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->leftjoin('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->join('users','master_npwp.nip_pendek','users.nip')
                                    ->select('users.*','wajib_spt.*','master_spt.no_tandaterima as bukti')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->orderBy('wajib_spt.nama_wp')->get();
        // dd($data['data_wp']);
        // perhitungan
        $data['totalwp'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->get()->count();
        $data['totalspt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['karSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%non%')
                                    ->where('wajib_spt.jenis_wp','NOT LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['nonkarSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','LIKE','%non%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['bdnSpt'] = WajibSpt::join('master_npwp','wajib_spt.npwp','master_npwp.key_npwp')
                                    ->join('master_spt','wajib_spt.npwp','master_spt.key_npwp')
                                    ->where('master_npwp.kelurahan',$wilayah->kelurahan)
                                    ->where('wajib_spt.jenis_wp','LIKE','%badan%')
                                    ->where('master_spt.pembetulan','>=',0)
                                    ->get()->count();
        $data['realisasi'] = (($data['totalspt']/$data['totalwp']) * 100);
        $data['capaian'] = ((($data['totalspt']/$data['totalwp']) * 100) / $target_pusat->target) * 100;

        return view('backend.wilayah.kec_tapos.show',$data);
    }
}
