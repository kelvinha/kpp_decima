<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\WajibPajak;
use App\Models\LaporanSpt;
use Illuminate\Http\Request;
use Auth;
class WajibPajakController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:admin');
    }

    public function index()
    {
        $data['data_wp'] = WajibPajak::GET();
        
        return view('backend.wajib_pajak.kelola_wajib_pajak.index', $data);
    }
    
    public function indexSudahlapor()
    {
        $laporanspt = LaporanSpt::join('wajib_pajak','spt.npwp_wp','wajib_pajak.npwp')
                      ->where('spt.status_lapor','Sudah Lapor')
                      ->select('wajib_pajak.*','spt.*')
                      ->get();
        $data['laporan'] = $laporanspt;
        $data['tahun'] = range(date('Y'), 1990);
        return view('backend.wajib_pajak.sudah_laporSpt.index',$data);
    }
    
    public function indexBelumlapor()
    {
        $laporanspt = LaporanSpt::join('wajib_pajak','spt.npwp_wp','wajib_pajak.npwp')
                      ->where('spt.status_lapor','Belum Lapor')
                      ->select('wajib_pajak.*','spt.*')
                      ->get();
        $data['laporan'] = $laporanspt;
        $data['tahun'] = range(date('Y'), 1990);
        return view('backend.wajib_pajak.belum_laporSpt.index',$data);
    }

    public function create()
    {
        $data['tahun'] = range(date('Y'), 1990);
        return view('backend.wajib_pajak.kelola_wajib_pajak.create',$data);
    }

    public function store(Request $request)
    {
        // dd($request);
        $cek = WajibPajak::where('npwp',$request->get('npwp'))->get()->count();
        // dd($cek);
        if($cek == 1)
        {
            return redirect()->route('wp.create')->with(['error' => 'NPWP sudah terdaftar, silahkan dicek kembali']);
        }
        else {

            $new_wp = new WajibPajak;
            $new_wp->npwp = $request->get('npwp');
            $new_wp->nama = $request->get('nama');
            $new_wp->email = $request->get('email');
            $new_wp->no_hp = $request->get('no_hp');
            $new_wp->alamat = $request->get('alamat');
            $new_wp->kategori_wp = $request->get('kategori_wp');
            $new_wp->jenis_spt = $request->get('jenis_spt');
            $new_wp->tahun_pajak = $request->get('tahun_pajak');
            $new_wp->email = $request->get('email');
            $new_wp->save();
    
            $new_laporan_spt = new LaporanSpt;
            $new_laporan_spt->npwp_wp = $request->get('npwp');
            $new_laporan_spt->id_wp = $new_wp->id_wp;
            $new_laporan_spt->save();
    
            return redirect()->route('wp.index')->with(['success' => 'Data Berhasil Ditambah']);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['wp'] = WajibPajak::where('id_wp',$id)->first();
        $data['tahun'] = range(date('Y'), 1990);
        return view('backend.wajib_pajak.kelola_wajib_pajak.edit',$data);
    }

    public function update(Request $request, $id)
    {
        // dd($request);

        $wp_update = WajibPajak::where('id_wp', $id)->first();
        // dd($wp_update);
        $wp_update->npwp = $request->get('npwp');
        $wp_update->nama = $request->get('nama');
        $wp_update->email = $request->get('email');
        $wp_update->no_hp = $request->get('no_hp');
        $wp_update->alamat = $request->get('alamat');
        $wp_update->kategori_wp = $request->get('kategori_wp');
        $wp_update->jenis_spt = $request->get('jenis_spt');
        $wp_update->tahun_pajak = $request->get('tahun_pajak');
        $wp_update->save();

        $laporanspt_update = LaporanSpt::where('id_wp',$id)->first();
        $laporanspt_update->npwp_wp = $request->get('npwp');
        $laporanspt_update->save();

        return redirect()->route('wp.index')->with(['success' => 'Data berhasil diperbarui']);        
    }

    public function destroy(Request $req)
    {
        // dd($req);
        $npwp = WajibPajak::where('npwp',$req->idnpwp);
        $npwp->delete();

        $npwp_wp = LaporanSpt::where('npwp_wp',$req->idnpwp);
        $npwp_wp->delete();

        return redirect()->route('wp.index')->with('deleted','Data Berhasil Dihapus !');
    }
}
