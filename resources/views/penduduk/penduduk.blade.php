@extends('master')
@section('title','Penduduk')
@section('header')
@endsection
@section('navbar')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Dashboard</strong> Penduduk</h1>
        <div class="row">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total Penduduk</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{$jumlah_penduduk}}</h1>
                                </div>
                                <a href="{{route('data_penduduk')}}" class="btn btn-primary">Data Penduduk =></a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Rukun Tetangga</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="home"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">64</h1>
                                </div>
                                <a href="{{route('data_rukun_tetangga')}}" class="btn btn-primary">Data Rukun Tetangga =></a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Jumlah Keluarga</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">25</h1>
                                </div>
                                <a href="{{route('penduduk')}}" class="btn btn-primary">Data Keluarga =></a>
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