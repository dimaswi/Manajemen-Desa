<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hak_akses extends Model
{
    protected $table = 'master_hak_akses';
    protected $primaryKey = 'master_hak_akses_id';
    protected $fillable = [
        'master_hak_akses_id', 
        'master_hak_akses_nama',
        'master_hak_akses_keterangan'
    ];
}
