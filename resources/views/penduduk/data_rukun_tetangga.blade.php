@extends('master')
@section('title','Rukun Tetangga')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
@endsection
@section('navbar')
<main class="content">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1><Strong>Data</Strong> Rukun Tetangga</h1>
                <div style="background-color: white; padding: 2%;">
                    <table id="table_rukun_tetangga" class="tabel display" style="background-color: white; width: 100%;">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Ketua RT</td>
                                <td>Rukun Tetangga</td>
                                <td>Jumlah Warga</td>
                                <td>Informasi</td>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="ModalEdit" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Rukun Tetangga</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close" type="button"></button>
            </div>
            <form action="{{route('edit_rukun_tetangga')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="" name="id_rukun_tetangga" id="id_rukun_tetangga">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-house-fill"></i></span>
                        <div class="form-floating">
                            <input value="" type="text" class="form-control @error ('edit_rukun_tetangga') is-invalid @enderror" id="modal_edit_rukun_tetangga" name="edit_rukun_tetangga" placeholder="Rukun Tetangga" required>
                            <label for="floatingInputGroup1">Rukun Tetangga</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                        <div class="form-floating">
                            <input value="" type="text" class="form-control @error ('edit_nama_ketua_rt') is-invalid @enderror" id="modal_edit_ketua_rt" name="edit_nama_ketua_rt" placeholder="Ketua RT" required>
                            <label>Nama Ketua RT</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                        <div class="form-floating">
                            <input value="" type="text" class="form-control @error ('edit_jumlah_warga') is-invalid @enderror" id="modal_edit_jumlah_warga" name="edit_jumlah_warga" placeholder="Jumlah Warga">
                            <label>Jumlah Warga</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-edit" name="btnsave" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalDetail" tabindex="-1" aria-labelledby="modal_tambah_dataLabel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penduduk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="table_data_penduduk" class="tabel display" style="background-color: white; width: 100%;">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>NIK</td>
                            <td>Nomor Kartu Keluarga</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        var table_rt = $('#table_rukun_tetangga').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data_rukun_tetangga') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'ketua_rt',
                    name: 'ketua_rt'
                },
                {
                    data: 'rukun_tetangga',
                    name: 'rukun_tetangga'
                },
                {
                    data: 'jumlah_warga',
                    name: 'jumlah_warga'
                },
                {
                    render: function(data, type, row) {
                        return '<button id="data_penduduk" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalDetail"><span><i class="bi bi-people-fill"></i></i></span></button> ' +
                            '<button id="edit_rukun_tetangga" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEdit"><span><i class="bi bi-pencil-fill"></i></span></button>'
                    }
                },
            ]
        })
        $('#table_rukun_tetangga').on('click', 'tr', function() {
            var id = table_rt.row(this).data()
            console.log(id.id)
            $('#id_rukun_tetangga').val(id.id)
            $('#modal_edit_rukun_tetangga').val(id.rukun_tetangga)
            $('#modal_edit_ketua_rt').val(id.ketua_rt)
            $('#modal_edit_jumlah_warga').val(id.jumlah_warga)
        })

        var table_penduduk = $('#table_data_penduduk').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data_penduduk_rt') }}",
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
            ]
        })
    });
</script>
@endsection
@section('footer')
@endsection