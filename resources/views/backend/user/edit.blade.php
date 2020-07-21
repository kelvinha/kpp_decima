@extends('layouts.backend')
@section('content')

<section class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Data Pegawai</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Data Pegawai</li>
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
            <form class="form-horizontal" method="POST" action="{{route('user.update',[$user->id])}}">
            {{csrf_field()}}
            <div class="card-body">
                <div class="form-group row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="nip" name="nip" readonly placeholder="Masukkan NIP" value="{{$user->nip}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Pegawai" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="seksi" class="col-sm-2 col-form-label">Seksi</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="seksi" name="seksi">
                            <option>Pilih Seksi...</option>
                            <option value="Seksi Pengawasan dan Konsultasi II" @if($user->seksi == "Seksi Pengawasan dan Konsultasi II") selected @endif>Seksi Pengawasan dan Konsultasi II</option>
                            <option value="Seksi Pengawasan dan Konsultasi III" @if($user->seksi == "Seksi Pengawasan dan Konsultasi III") selected @endif>Seksi Pengawasan dan Konsultasi III</option>
                            <option value="Seksi Pengawasan dan Konsultasi IV" @if($user->seksi == "Seksi Pengawasan dan Konsultasi IV") selected @endif>Seksi Pengawasan dan Konsultasi IV</option>
                            <option value="Seksi Ekstensifikasi dan Penyuluhan" @if($user->seksi == "Seksi Ekstensifikasi dan Penyuluhan") selected @endif>Seksi Ekstensifikasi dan Penyuluhan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="role" name="role">
                            <option>Pilih Role...</option>
                            <option value="admin" @if($user->role == "admin") selected @endif>Admin</option>
                            <option value="pegawai" @if($user->role == "pegawai") selected @endif>Pegawai</option>
                        </select>
                    </div>
                </div>
            </div>
                <div class="card-footer">
                <button type="submit" name="tombol" class="btn btn-default float-right"><a href="{{route('user.index')}}">Cancel</a></button>
                <button type="submit" name="tombol" class="btn btn-info float-right">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</section>
@endsection