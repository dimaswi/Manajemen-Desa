@extends('master')
@section('title','Dashboard')
@section('header')
@endsection
@section('navbar')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Dashboard</strong> Desa</h1>
        <div class="row">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                            <img src="{{asset('/images/people-many.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Data Penduduk</h5>
                                <p class="card-text">Olah data kependuduk pada desa</p>
                                <a href="{{route('penduduk')}}" class="btn btn-primary">Data Penduduk =></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('/images/money.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Data Anggaran</h5>
                                <p class="card-text">Olah data anggaran APBD desa</p>
                                <a href="{{route('anggaran')}}" class="btn btn-primary">Data Anggaran =></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                            <img src="{{asset('/images/decision.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">SPK</h5>
                                <p class="card-text">Sistem Pendukung keputusan</p>
                                <a href="{{route('spk')}}" class="btn btn-primary">SPK =></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('footer')
@endsection