<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\WajibPajak;
use App\Models\LaporanSpt;
use Illuminate\Http\Request;

class LaporanSptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:admin');
    }

    public function index()
    {
        $laporanspt = LaporanSpt::join('wajib_pajak','spt.npwp_wp','wajib_pajak.npwp')
                      ->select('wajib_pajak.*','spt.*')
                      ->get();
        // dd($laporanspt);
        $data['laporan'] = $laporanspt;
        return view('backend.laporan_spt.index',$data);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['laporan'] = LaporanSpt::join('wajib_pajak','spt.npwp_wp','wajib_pajak.npwp')
                      ->where('wajib_pajak.id_wp',$id)
                      ->select('wajib_pajak.*','spt.*')
                      ->first();
        return view('backend.laporan_spt.show',$data);
    }

    public function edit($id)
    {
        // $data['laporan'] = LaporanSpt::find($id);
        $data['laporan'] = LaporanSpt::join('wajib_pajak','spt.npwp_wp','wajib_pajak.npwp')
                                     ->where('id_spt',$id)
                                     ->select('spt.*','wajib_pajak.nama')
                                     ->first();

        return view('backend.laporan_spt.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $tanggal = date('d F Y');
        // dd($tanggal);
        $update_laporan = LaporanSpt::find($id);
        $update_laporan->status_lapor = $request->get('status_lapor');
        if( $request->get('status_lapor') == 'Belum Lapor' ) {
            $update_laporan->tanggal_lapor = NULL;
        }
        else {
            $update_laporan->tanggal_lapor = $tanggal;
        }
        $update_laporan->save();

        return redirect()->route('laporanspt.index')->with('sukses','Laporan Berhasil Diperbarui');
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
