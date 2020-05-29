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

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        //
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
