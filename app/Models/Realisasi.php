<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    use HasFactory;
    protected $table = 'realisasi';
    protected $fillable = [
        'nisn',
        'nama',
        'tahun',
        'pagu_anggaran',
        'rencana_tw1',
        'realisasi_tw1',
        'rencana_tw2',
        'realisasi_tw2',
        'rencana_tw3',
        'realisasi_tw3',
        'rencana_tw4',
        'realisasi_tw4',
    ];
}
