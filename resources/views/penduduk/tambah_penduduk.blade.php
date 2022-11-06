@extends('master')
@section('title','Tambah Penduduk')
@section('header')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
@endsection
@section('navbar')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Data</strong> Penduduk</h1>
        <div class="container">
            <table id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Nomor Kartu Keluarga</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</main>
@endsection
@section('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection