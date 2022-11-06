<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'master_penduduk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 
        'nama',
        'NIK',
        'nomor_keluarga',
        'status',
        'status_perkawinan',
        'jenis_kelamin',
        'tempat_lahir',
        'agama',
        'alamat',
        'tanggal_lahir',
        'pekerjaan',
        'penghasilan',
        'foto',
    ];
}
