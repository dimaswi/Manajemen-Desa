<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_edit extends Model
{
    protected $table = 'master_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 
        'username',
        'password'
    ];
}
