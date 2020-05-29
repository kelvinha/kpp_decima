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
            $new_laporan_spt->save();
    
            return redirect()->route('wp.index')->with(['success' => 'Data Berhasil Ditambah']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('backend.wajib_pajak.kelola_wajib_pajak.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
