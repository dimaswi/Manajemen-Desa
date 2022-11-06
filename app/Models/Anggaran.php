<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $table = 'master_anggaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 
        'jumlah_anggaran',
        'realisasi',
        'sisa_anggaran'
    ];
}
