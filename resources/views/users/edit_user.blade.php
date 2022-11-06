@extends('master')
@section('title','Edit User')
@section('header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
@endsection
@section('navbar')
<main class="content">
    <div class="container-sm">
        <div class="card">
            <div class="card-header">
                <strong>Edit</strong> Profile
            </div>
            <form name="custForm needs-validation" novalidate action="{{route('simpan_user')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                        <div class="form-floating">
                            <input value="{{$tabel_user->name}}" type="text" class="form-control @error ('name') is-invalid @enderror" id="name" name="name" placeholder="nama">
                            <label for="floatingInputGroup1">Nama</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-badge-cc"></i></span>
                        <div class="form-floating">
                            <input value="{{$tabel_user->NIP}}" type="text" class="form-control @error ('nip') is-invalid @enderror" id="nip" name="nip" placeholder="nip">
                            <label for="floatingInputGroup1">NIP</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                        <div class="form-floating">
                            <input value="{{$tabel_user->jabatan}}" type="text" class="form-control @error ('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" placeholder="jabatan">
                            <label for="floatingInputGroup1">Jabatan</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                        <div class="form-floating">
                            <input value="{{$tabel_user->nomor_hp}}" type="text" class="form-control @error ('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp" placeholder="nomor_hp">
                            <label for="floatingInputGroup1">Nomor Handphone</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                        <div class="form-floating">
                            <input value="{{$tabel_user->alamat_rumah}}" type="text" class="form-control @error ('alamat_rumah') is-invalid @enderror" id="alamat_rumah" name="alamat_rumah" placeholder="alamat">
                            <label for="floatingInputGroup1">Alamat</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <div class="form-floating">
                            <input value="{{$tabel_user->email}}" type="text" class="form-control @error ('email') is-invalid @enderror" id="email" name="email" placeholder="email">
                            <label for="floatingInputGroup1">Email</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Upload Foto Anda</label>
                        <input type="hidden" value="{{ $tabel_user->image }}" name="oldImage">
                        <input value="D:\Ayang\ayang-1.png" accept="image/*" class="form-control @error ('file') is-invalid @enderror" id="file" type="file" name="file" multiple>
                        <img src="{{asset('storage/'.$tabel_user->image)}}" alt="avatar" style="width: 150px;">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
@section('footer')
@endsection