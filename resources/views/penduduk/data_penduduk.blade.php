@extends('master')
@section('title','Penduduk')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
@endsection
@section('navbar')

<?php

?>

<main class="content">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
        {{ session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h1><Strong>Data</Strong> Penduduk</h1>
    <div style="background-color: white; padding: 2%;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_tambah_data">Tambah Data</button>
        <br>
        <br>
        <table id="tabel" class="tabel display" style="background-color: white; width: 100%;">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>NIK</td>
                    <td>Nomor Kartu Keluarga</td>
                    <td>Actions</th>
                    <td style="display: none;">Foto</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</main>


<!-- Modal Tambah Data -->
<div class="modal fade" id="modal_tambah_data" tabindex="-1" aria-labelledby="modal_tambah_dataLabel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penduduk</h5>
            </div>
            <div class="modal-body">
                <form name="custForm" action="{{route('tambah_penduduk')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="cust_id" id="cust_id">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                        <div class="form-floating">
                            <input value="{{old('nama')}}" type="text" class="form-control @error ('nama') is-invalid @enderror" id="floatingInputGroup1" name="nama" placeholder="nama" onchange="validate()">
                            <label for="floatingInputGroup1">Nama</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-badge-cc"></i></span>
                        <div class="form-floating">
                            <input value="{{old('nik')}}" type="text" class="form-control @error ('nik') is-invalid @enderror" id="floatingInputGroup1" name="nik" placeholder="nip" onchange="validate()">
                            <label for="floatingInputGroup1">NIK</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                    <input accept="image/*" class="form-control @error ('file') is-invalid @enderror" id="file" type="file" name="file" multiple>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                        <div class="form-floating">
                            <input value="{{old('nomor_kk')}}" type="text" class="form-control @error ('nomor_kk') is-invalid @enderror" id="floatingInputGroup1" name="nomor_kk" placeholder="jabatan" onchange="validate()">
                            <label for="floatingInputGroup1">Nomor Kartu Keluarga</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-house-fill"></i></span>
                        <div class="form-floating">
                            <input value="{{old('tempat_lahir')}}" type="text" class="form-control @error ('tempat_lahir') is-invalid @enderror" id="floatingInputGroup1" name="tempat_lahir" placeholder="nama" onchange="validate()">
                            <label for="floatingInputGroup1">Tempat Lahir</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-calendar-date-fill"></i></span>
                        <div class="form-floating">
                            <input value="{{old('tanggal_lahir')}}" type="date" class="form-control @error ('tanggal_lahir') is-invalid @enderror" id="floatingInputGroup1" name="tanggal_lahir" placeholder="nip" onchange="validate()">
                            <label for="floatingInputGroup1">Tanggal Lahir</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-briefcase-fill"></i></span>
                        <div class="form-floating">
                            <input value="{{old('pekerjaan')}}" type="text" class="form-control @error ('pekerjaan') is-invalid @enderror" id="floatingInputGroup1" name="pekerjaan" placeholder="jabatan" onchange="validate()">
                            <label for="floatingInputGroup1">Pekerjaan</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                        <div class="form-floating">
                            <input value="{{old('jenis_kelamin')}}" type="text" class="form-control @error ('jenis_kelamin') is-invalid @enderror" id="floatingInputGroup1" name="jenis_kelamin" placeholder="nama" onchange="validate()">
                            <label for="floatingInputGroup1">Jenis Kelamin</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-moon-fill"></i></span>
                        <div class="form-floating">
                            <input value="{{old('agama')}}" type="text" class="form-control @error ('agama') is-invalid @enderror" id="floatingInputGroup1" name="agama" placeholder="nip" onchange="validate()">
                            <label for="floatingInputGroup1">Agama</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-signpost-split"></i></span>
                        <div class="form-floating">
                            <input value="{{old('alamat')}}" type="text" class="form-control @error ('alamat') is-invalid @enderror" id="floatingInputGroup1" name="alamat" placeholder="jabatan" onchange="validate()">
                            <label for="floatingInputGroup1">Alamat</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-arrow-through-heart-fill"></i></span>
                        <div class="form-floating">
                            <input value="{{old('status_perkawinan')}}" type="text" class="form-control @error ('status_perkawinan') is-invalid @enderror" id="floatingInputGroup1" name="status_perkawinan" placeholder="nama" onchange="validate()">
                            <label for="floatingInputGroup1">Status Perkawinan</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-person-check-fill"></i></span>
                        <div class="form-floating">
                            <select name="status" id="" class="form-control @error ('status') is-invalid @enderror">
                                <option value="" selected disabled>Pilih Status</option>
                                <option value="Hidup">Hidup</option>
                                <option value="Meninggal">Meninggal</option>
                                <option value="Pindah">Pindah</option>
                            </select>    
                            <label for="floatingInputGroup1">Status</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-coin"></i></span>
                        <div class="form-floating">
                            <input value="{{old('penghasilan')}}" type="text" class="form-control @error ('penghasilan') is-invalid @enderror" id="floatingInputGroup1" name="penghasilan" placeholder="jabatan" onchange="validate()">
                            <label for="floatingInputGroup1">Penghasilan</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary tambah_data">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Data -->

<!-- Modal Detail Data -->
<div class="modal fade" id="ModalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-info-circle"></i><strong> Detail</strong> Penduduk</h1>
            </div>
            <div class="modal-body">
                <input type="hidden" id="detail_id_penduduk" name="id_penduduk">
                {{method_field('PATCH')}}
                <div id="foto-penduduk" class="card-body text-center">
                    <h2>Detail Data Penduduk</h2>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th><i class="bi bi-person-circle"></i></th>
                                    <th>Nama</th>
                                    <td><span id="modal_detail_nama"></span></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-card-image"></i></th>
                                    <th>Foto</th>
                                    <td><a id="modal_detail_foto" class="btn btn-secondary" target="_blank">Foto</a></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-123"></i></th>
                                    <th>NIK</th>
                                    <td><span id="modal_detail_nik"></span></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-people-fill"></i></th>
                                    <th>Nomor Kartu Keluarga</th>
                                    <td><span id="modal_detail_nomor_keluarga"></span></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-house-fill"></i></th>
                                    <th>Tempat Lahir</th>
                                    <td><span id="modal_detail_tempat_lahir"></span></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-calendar-date-fill"></i></i></th>
                                    <th>Tanggal Lahir</th>
                                    <td><span id="modal_detail_tanggal_lahir"></span></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-briefcase-fill"></i></i></i></th>
                                    <th>Pekerjaan</th>
                                    <td><span id="modal_detail_pekerjaan"></span></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-gender-ambiguous"></i></th>
                                    <th>Jenis Kelamin</th>
                                    <td><span id="modal_detail_jenis_kelamin"></span></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-moon-fill"></i></th>
                                    <th>Agama</th>
                                    <td><span id="modal_detail_agama"></span></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-signpost-split"></i></th>
                                    <th>Alamat</th>
                                    <td><span id="modal_detail_alamat"></span></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-arrow-through-heart-fill"></i></th>
                                    <th>Status Perkawinan</th>
                                    <td><span id="modal_detail_status_perkawinan"></span></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-person-check-fill"></i></i></th>
                                    <th>Status</th>
                                    <td><button class="btn btn-danger" id="modal_detail_status" disabled></button></td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-coin"></i></i></i></th>
                                    <th>Penghasilan</th>
                                    <td><span id="modal_detail_penghasilan"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a id="surat_meninggal" href="" class="btn btn-danger">Meninggal</a>
                <a id="surat_pindah" href="" class="btn btn-warning">Perpindahan</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Detail Data -->

<!-- Modal Edit Data -->
<div class="modal fade" id="ModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-pencil-square"></i><strong> Edit</strong> Penduduk</h1>
            </div>
            <div class="modal-body">
                {{method_field('PATCH')}}
                <form name="custForm" action="{{route('update_data_penduduk')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="edit_id_penduduk" name="edit_id_penduduk" value="">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('edit_nama') is-invalid @enderror" id="modal_edit_nama" name="edit_nama" placeholder="nama" onchange="validate()">
                            <label for="floatingInputGroup1">Nama</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input accept="image/*" class="form-control @error ('file') is-invalid @enderror" id="modal_edit_foto" type="file" name="file" multiple>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-badge-cc"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('edit_nik') is-invalid @enderror" id="modal_edit_nik" name="edit_nik" placeholder="nip" onchange="validate()">
                            <label for="floatingInputGroup1">NIK</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('edit_nomor_keluarga') is-invalid @enderror" id="modal_edit_nomor_keluarga" name="edit_nomor_keluarga" placeholder="jabatan" onchange="validate()">
                            <label for="floatingInputGroup1">Nomor Kartu Keluarga</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-house-fill"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('tempat_lahir') is-invalid @enderror" id="modal_edit_tempat_lahir" name="tempat_lahir" placeholder="nama" onchange="validate()">
                            <label for="floatingInputGroup1">Tempat Lahir</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-calendar-date-fill"></i></span>
                        <div class="form-floating">
                            <input type="date" class="form-control @error ('tanggal_lahir') is-invalid @enderror" id="modal_edit_tanggal_lahir" name="tanggal_lahir" placeholder="nip" onchange="validate()">
                            <label for="floatingInputGroup1">Tanggal Lahir</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-briefcase-fill"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('pekerjaan') is-invalid @enderror" id="modal_edit_pekerjaan" name="pekerjaan" placeholder="jabatan" onchange="validate()">
                            <label for="floatingInputGroup1">Pekerjaan</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('jenis_kelamin') is-invalid @enderror" id="modal_edit_jenis_kelamin" name="jenis_kelamin" placeholder="nama" onchange="validate()">
                            <label for="floatingInputGroup1">Jenis Kelamin</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-moon-fill"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('agama') is-invalid @enderror" id="modal_edit_agama" name="agama" placeholder="nip" onchange="validate()">
                            <label for="floatingInputGroup1">Agama</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-signpost-split"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('alamat') is-invalid @enderror" id="modal_edit_alamat" name="alamat" placeholder="jabatan" onchange="validate()">
                            <label for="floatingInputGroup1">Alamat</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-arrow-through-heart-fill"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('status_perkawinan') is-invalid @enderror" id="modal_edit_status_perkawinan" name="status_perkawinan" placeholder="nama" onchange="validate()">
                            <label for="floatingInputGroup1">Status Perkawinan</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-person-check-fill"></i></span>
                        <div class="form-floating">
                        <select name="status" id="modal_edit_status" class="form-control @error ('status') is-invalid @enderror">
                                <option value="Hidup">Hidup</option>
                                <option value="Meninggal">Meninggal</option>
                                <option value="Pindah">Pindah</option>
                            </select>    
                            <label for="floatingInputGroup1">Status</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-coin"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control @error ('penghasilan') is-invalid @enderror" id="modal_edit_penghasilan" name="penghasilan" placeholder="jabatan" onchange="validate()">
                            <label for="floatingInputGroup1">Penghasilan</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" id="btn-edit" name="btnsave" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Data -->


<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        var tabel = $('#tabel').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data_penduduk') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    width: '5%'
                },
                {
                    data: 'nama',
                    name: 'nama',
                    width: '20%'
                },
                {
                    data: 'NIK',
                    name: 'NIK',
                    width: '20%'
                },
                {
                    data: 'nomor_keluarga',
                    name: 'nomor_keluarga',
                    width: '20%'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    width: '35%',
                    render: function(data, type, row) {
                        return '<button id="detail" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalDetail"><span><i class="bi bi-info-circle"></i></span>Detail</button> ' +
                            '<button id="edit" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEdit"><span><i class="bi bi-pencil-square"></i></span>Edit</button> ' +
                            '<button type="button" id="tombol_hapus" class="btn btn-danger tombol_hapus"><span><i class="bi bi-trash"></i></span>Hapus</button> ';
                    }
                },
                {
                    data: 'foto',
                    name: 'foto',
                    render: function(data) {
                        return '<img src="http://127.0.0.1:8000/storage/' + data + '" style=" display: none;height : 150px;">';
                    }
                }
            ]

        })
        $('#tabel').on('change', 'tr', function() {
            var id = tabel.row(this).data()
            console.log(id.nama);
            $('#foto-penduduk').attr('src', `{{ asset('storage/') }}${src}`)
        })

        $('#tabel').on('click', 'tr', function() {
            var id = tabel.row(this).data()
            var src = "/" + id.foto
            
            $('#detail_id_penduduk').val(id.id)
            $('#modal_detail_nama').text(id.nama)
            $('#modal_detail_nik').text(id.NIK)
            $('#modal_detail_nomor_keluarga').text(id.nomor_keluarga)
            $('#modal_detail_tempat_lahir').text(id.tempat_lahir)
            $('#modal_detail_tanggal_lahir').text(id.tanggal_lahir)
            $('#modal_detail_jenis_kelamin').text(id.jenis_kelamin)
            $('#modal_detail_agama').text(id.agama)
            $('#modal_detail_alamat').text(id.alamat)
            $('#modal_detail_status_perkawinan').text(id.status_perkawinan)
            $('#modal_detail_status').html(id.status)
            $('#modal_detail_pekerjaan').text(id.pekerjaan)
            $('#modal_detail_penghasilan').text(id.penghasilan)
            $('#pekerjaan').text(id.status)
            $('#penghasilan').text(id.status)
            $('#edit_id_penduduk').val(id.id)
            $("#modal_detail_foto").attr('href', `{{ asset('storage/') }}${src}`)
            $('#modal_edit_nama').val(id.nama)
            $('#modal_edit_nik').val(id.NIK)
            $('#modal_edit_nomor_keluarga').val(id.nomor_keluarga)
            $('#modal_edit_tempat_lahir').val(id.tempat_lahir)
            $('#modal_edit_tanggal_lahir').val(id.tanggal_lahir)
            $('#modal_edit_jenis_kelamin').val(id.jenis_kelamin)
            $('#modal_edit_agama').val(id.agama)
            $('#modal_edit_alamat').val(id.alamat)
            $('#modal_edit_status_perkawinan').val(id.status_perkawinan)
            $('#modal_edit_status').val(id.status)
            $('#modal_edit_penghasilan').val(id.penghasilan)
            $('#modal_edit_pekerjaan').val(id.pekerjaan)
            $('#modal_edit_foto').val(id.foto)
            

            var status = id.status
            if (status == 'Meninggal') {
                $('#modal_detail_status').addClass('btn-danger')
                $('#modal_detail_status').removeClass('btn-success')
                $('#modal_detail_status').removeClass('btn-warning')
            } else if (status == 'Hidup') {
                $('#modal_detail_status').addClass('btn-success')
                $('#modal_detail_status').removeClass('btn-danger')
                $('#modal_detail_status').removeClass('btn-warning')
            } else if (status == 'Pindah') {
                $('#modal_detail_status').addClass('btn-warning')
                $('#modal_detail_status').removeClass('btn-danger')
                $('#modal_detail_status').removeClass('btn-success')
            }
        });


        $('#tabel').on('click', '#tombol_hapus', tabel, function() {
            const data = tabel.row($(this).parents('tr')).data();
            Swal.fire({
                title: 'Apakah Anda Yakin Akan Menghapus Data?',
                type: 'warning',
                showDenyButton: true,
                confirmButtonText: 'Hapus',
                denyButtonText: `Batal`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{url('')}}/hapus_data_penduduk/" + data.id,
                        type: "POST",
                    }).done(function(result) {
                        Swal.fire('Success', '', 'success')
                        window.location = '{{route("data_penduduk")}}';
                        $('#alert').show();
                    });
                } else if (result.isDenied) {
                    Swal.fire('Batal', '', 'info')
                }
            })
        });

        $('#btn-save').on('click', function() {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Berhasil Disimpan',
                showConfirmButton: false,
            })
        });
    });
</script>

@endsection
@section('footer')
@endsection