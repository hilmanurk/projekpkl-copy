<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BOPSekolah extends Model
{
    use HasFactory;
    protected $table = 'bop_sekolah';
    protected $fillable = [
        'cabdin',
        'kabupaten/kota',
        'nisn',
        'nama',
        'jenjang'
    ];
}
