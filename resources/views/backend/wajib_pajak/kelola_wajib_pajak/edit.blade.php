@extends('layouts.backend')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data Wajib Pajak</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Data Wajib Pajak</li>
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
                        <h3 class="card-title">Form Edit Data</h3>
                    </div>
                    <form action="{{ route('wp.update',['id' => $wp->id_wp]) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="npwp">Nomor Pokok Wajib Pajak (NPWP) <span
                                                class="font-weight-w300 text-red">*</span> </label>
                                        <input type="text" class="form-control" id="npwp"
                                            placeholder="Masukan Nomor Pokok Wajib Pajak..." required
                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')" name="npwp"
                                            value="{{ $wp->npwp }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap <span class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="nama"
                                            placeholder="Masukan Nama Lengkap..." name="nama" required
                                            value="{{ $wp->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email <span class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Masukan Email..." required name="email"
                                            value="{{ $wp->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No Hp <span class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                            maxlength="12" class="form-control" id="nohp" placeholder="Masukan No Hp..."
                                            required name="no_hp" value="{{ $wp->no_hp }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="alamat">Alamat<span
                                                class="font-weight-w300 text-red">*</span></label>
                                        <textarea rows="1" class="form-control" placeholder="Masukan Alamat" required
                                            name="alamat" value="{{ $wp->alamat }}">{{ $wp->alamat }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori">Kategori <span class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <select class="form-control" name="kategori_wp" id="kategori" required>
                                            <option value="{{ $wp->kategori_wp}}" selected>{{ $wp->kategori_wp }}
                                            </option>
                                            <option disabled>Pilih Kategori</option>
                                            <option disabled class="font-weight-bold">• Wajib Pajak Orang Pribadi
                                            </option>
                                            <option value="Orang Pribadi (Induk)">Orang Pribadi (Induk)</option>
                                            <option value="Hidup Berpisah (HB)">Hidup Berpisah (HB)</option>
                                            <option value="Pisah Harta (PH)">Pisah Harta (PH)</option>
                                            <option value="Memilih Terpisah (MT)">Memilih Terpisah (MT)</option>
                                            <option value="Warga Belum Terbagi (WBT)">Warga Belum Terbagi (WBT)</option>
                                            <option disabled class="font-weight-bold">• Wajib Pajak Badan </option>
                                            <option value="Badan">Badan</option>
                                            <option value="Joint Operation">Joint Operation</option>
                                            <option value="Kantor Perwakilan Perusahaan Asing">Kantor Perwakilan
                                                Perusahaan Asing</option>
                                            <option value="Bendahara">Bendahara</option>
                                            <option value="Penyelenggara Kegiatan">Penyelenggara Kegiatan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenisspt">Jenis SPT <span class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <select class="form-control" name="jenis_spt" id="jenisspt" required
                                            name="jenis_spt">
                                            <option value="{{ $wp->jenis_spt }}" selected>{{ $wp->jenis_spt }}</option>
                                            <option disabled>Pilih Kategori</option>
                                            <option value="SPT Tahunan">SPT Tahunan</option>
                                            <option value="SPT Masa">SPT Masa</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahunpjk">Tahun Pajak <span
                                                class="font-weight-w300 text-red">*</span>
                                        </label>
                                        <select class="form-control" id="tahunpjk" required name="tahun_pajak">
                                            <option value="{{ $wp->tahun_pajak }}" selected>{{ $wp->tahun_pajak }}
                                            </option>
                                            <option disabled>Pilih Tahun</option>
                                            @foreach ($tahun as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
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
