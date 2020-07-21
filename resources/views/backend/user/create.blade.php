@extends('layouts.backend')
@section('content')

<section class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Tambah Data Pegawai</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Tambah Data Pegawai</li>
            </ol>   
        </div>
    </div>
</div>
</section>

<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
                @include('backend.alert.error')
            <div class="card-header">
                <form class="form-horizontal" method="POST" action="{{route('user.store')}}">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP*</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="{{old('nip')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Pegawai*</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Pegawai" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password*</label>
                        <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="seksi" class="col-sm-2 col-form-label">Seksi*</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="seksi" name="seksi">
                                <option value="">Pilih Seksi...</option>
                                <option value="Seksi Pengawasan dan Konsultasi II">Seksi Pengawasan dan Konsultasi II</option>
                                <option value="Seksi Pengawasan dan Konsultasi III">Seksi Pengawasan dan Konsultasi III</option>
                                <option value="Seksi Pengawasan dan Konsultasi IV">Seksi Pengawasan dan Konsultasi IV</option>
                                <option value="Seksi Ekstensifikasi dan Penyuluhan">Seksi Ekstensifikasi dan Penyuluhan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Role*</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="role" name="role">
                                <option value="">Pilih Role...</option>
                                <option value="admin">Admin</option>
                                <option value="pegawai">Pegawai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body" >
                    <p style="color: #ff0000;"><strong>Keterangan : * (harus diisi)</strong></p>
                </div>
                <div class="card-footer">
                    <button type="submit" name="tombol" class="btn btn-default float-right"><a href="{{route('user.index')}}">Cancel</a></button>
                    <button type="submit" name="tombol" class="btn btn-info float-right">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection