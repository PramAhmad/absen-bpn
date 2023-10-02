<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'telepon',
        'alamat',
        'jabatan',
        'foto',
    ];
    // hashmany to absen
    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
}
