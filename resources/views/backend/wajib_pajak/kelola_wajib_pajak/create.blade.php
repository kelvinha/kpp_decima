@extends('layouts.backend')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah data Wajib Pajak</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tambah data Wajib Pajak</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header bg-kpp">
                        <h3 class="card-title">Form Tambah Data</h3>
                    </div>
                    <form action="" method="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="npwp">Nomor Pokok Wajib Pajak (NPWP) <span
                                                class="font-weight-w300 text-red">*</span> </label>
                                        <input type="text" class="form-control" id="npwp"
                                            placeholder="Masukan Nomor Pokok Wajib Pajak..." required
                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap <span class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="nama"
                                            placeholder="Masukan Nama Lengkap..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email <span class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Masukan Email..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No Hp <span class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                            maxlength="12" class="form-control" id="nohp" placeholder="Masukan No Hp..."
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="alamat">Alamat<span
                                                class="font-weight-w300 text-red">*</span></label>
                                        <textarea rows="1" class="form-control" placeholder="Masukan Alamat"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori">Kategori <span class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <select class="form-control" id="kategori" required>
                                            <option disabled selected>Pilih Kategori</option>
                                            <option>coba 1</option>
                                            <option>coba 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenisspt">Jenis SPT <span class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <select class="form-control" id="jenisspt" required>
                                            <option disabled selected>Pilih Jenis SPT</option>
                                            <option>coba 1</option>
                                            <option>coba 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahunpjk">Tahun Pajak <span
                                                class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <select class="form-control" id="tahunpjk" required>
                                            <option disabled selected>Pilih Tahun Pajak</option>
                                            <option>coba 1</option>
                                            <option>coba 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" align="right">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button onclick="window.history.back();" class="btn btn-warning">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection
