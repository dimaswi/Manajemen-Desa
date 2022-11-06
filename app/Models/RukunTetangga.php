<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RukunTetangga extends Model
{
    protected $table = 'master_rukun_tetangga';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 
        'rukun_tetangga',
        'ketua_rt',
        'jumlah_warga',
    ];
}
