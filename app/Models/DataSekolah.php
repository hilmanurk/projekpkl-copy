<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSekolah extends Model
{
    use HasFactory;

    protected $table = 'data_sekolah';
    protected $fillable = [
        'cabdin',
        'kabkota',
        'nisn',
        'nama',
        'jenjang',
        'email',
        'password'
    ];
    public $timestamps=false;
}
