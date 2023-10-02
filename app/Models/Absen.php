<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    // belongs to karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
    
}
