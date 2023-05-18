<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'Siswa';
    protected $fillable = [
        'nopes',
        'absen',
        'nama',
        'kelas',
        'hp_ortu',
    ];
    public $timestamps = false;
}
