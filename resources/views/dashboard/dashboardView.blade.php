@extends('dashboard.layout.layoutdashboard')

@section('content')
    <div class="row justify-content-center ms-2 mt-5" style="">
        <div class="col-lg-4">
            <img src="\assets\img\dashboard\profile.png" class="img-fluid" alt="profile.png">
        </div>
    </div>
    <div class="row justify-content-center ms-2 mt-5" style="">
        <div class="text-center mt-2">
            <h1>Selamat Datang, {{ auth()->user()->name }}</h1>
        </div>
    </div>

@endsection
