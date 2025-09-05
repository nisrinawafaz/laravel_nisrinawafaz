<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'hospital_id',
    ];

    // Relasi: Pasien milik satu Rumah Sakit
    public function rumahSakit()
    {
        return $this->belongsTo(Hospital::class);
    }
}