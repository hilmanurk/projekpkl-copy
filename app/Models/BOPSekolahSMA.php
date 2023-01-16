<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BOPSekolahSMA extends Model
{
    use HasFactory;
    protected $table = 'bop_sekolah_sma';
    protected $fillable = [
        'cabdin',
        'kabupaten/kota',
        'nisn',
        'nama',
        'jenjang',
        'alokasi_murni',
        'alokasi_tanpaSilpa',
        'alokasi_silpa',

    ];
}
