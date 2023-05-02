<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = [
        'nama',
        'nohp',
        'alamat',
        'tgl_in',
        'tgl_up',
    ];
}
