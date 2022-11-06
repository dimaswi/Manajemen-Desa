@extends('master')
@section('title','Profile')
@section('header')
@endsection
@section('navbar')
<main class="content">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{asset('storage/'.$tabel_user->image)}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{$tabel_user->name}}</h5>
                        <p class="text-muted mb-1">{{$tabel_user->jabatan}}</p>
                        <p class="text-muted mb-4">{{$tabel_user->alamat_rumah}}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{Route('edit_user')}}" type="button" class="btn btn-success">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$tabel_user->name}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$tabel_user->email}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nomor Telefon</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$tabel_user->nomor_hp}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Jabatan</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$tabel_user->jabatan}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat Rumah</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$tabel_user->alamat_rumah}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">NIP</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$tabel_user->NIP}}</p>
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