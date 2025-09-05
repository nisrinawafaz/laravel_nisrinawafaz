<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'telepon',
    ];

    // Relasi: satu Rumah Sakit punya banyak pasien
    public function pasien()
    {
        return $this->hasMany(Patient::class);
    }
}
