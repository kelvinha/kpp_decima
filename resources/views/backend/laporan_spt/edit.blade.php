@extends('layouts.backend')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Laporan SPT</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Laporan SPT</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-12">
                <div class="card elevation-2">
                    <div class="card-header bg-kpp">
                        <h3 class="card-title">Form Edit Laporan SPT</h3>
                    </div>
                <form action="{{ route('laporanspt.update',['id' => $laporan->id_spt]) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="npwp">Nomor Pokok Wajib Pajak (NPWP) </label>
                                        <input type="text" class="form-control" id="npwp"
                                            disabled name="npwp"
                                            value="{{ $laporan->npwp_wp }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Wajib Pajak</label>
                                    <input type="text" class="form-control"
                                        disabled
                                        value="{{ $laporan->nama }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Status Lapor</label>
                                        <br>
                                        <input type="radio" id="blm" name="status_lapor" value="Belum Lapor" 
                                        {{ $laporan->status_lapor == "Belum Lapor" ? "checked" : ""  }}>
                                        <label for="blm"><span class="badge badge-danger"><h6>Belum Lapor</h6></span></label>
                                        <br>
                                        <input type="radio" id="sdh" name="status_lapor" value="Sudah Lapor" {{ $laporan->status_lapor == "Sudah Lapor" ? "checked" : ""  }} >
                                        <label for="sdh"><span class="badge badge-success"><h6>Sudah Lapor</h6></span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" align="right">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button onclick="window.history.back();" class="btn btn-warning">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection
