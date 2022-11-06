<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    protected $table = 'master_perangkat_desa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 
        'nama',
        'NIK',
        'alamat',
        'jabatan'
    ];
}
