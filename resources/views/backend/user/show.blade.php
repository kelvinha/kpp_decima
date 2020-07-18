@extends('layouts.backend')
@section('content')

<section class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Detail Data Pegawai</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail Data Pegawai</li>
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
            <div class="card-body">
                <div class="col-lg-8 col-md-4 col-sm-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="font-weight-bold text-blue">NIP</h6>
                            <p>{{ $user->nip }}</p><br>
                            <h6 class="font-weight-bold text-blue">NAMA</h6>
                            <p>{{ $user->name }}</p><br>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="font-weight-bold text-blue">EMAIL</h6>
                            <p>{{ $user->email }}</p><br>
                            <h6 class="font-weight-bold text-blue">SEKSI</h6>
                            <p>{{ $user->seksi }}</p><br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="font-weight-bold text-blue">ROLE</h6>
                            <p>{{ $user->role }}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group float-right">
                    <a class="btn btn-primary" href="{{route('user.index')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection