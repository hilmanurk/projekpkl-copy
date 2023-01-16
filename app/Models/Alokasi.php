<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alokasi extends Model
{
    use HasFactory;
    protected $table = 'alokasi';
    protected $fillable = [
        'cabdin',
        'kabkota',
        'nisn',
        'nama',
        'jenjang',
        'tahun',
        'alokasi_murni',
        'alokasi_tanpaSilpa',
        'alokasi_silpa'
    ];
}
