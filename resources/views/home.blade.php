@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br>
                    <form action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-warning">LogOut</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
