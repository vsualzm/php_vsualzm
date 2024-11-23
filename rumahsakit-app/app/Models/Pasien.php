<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Field yang diperbolehkan untuk mass assignment
    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'rumah_sakit_id',
    ];

    // Relasi ke Rumah Sakit
    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class, 'rumah_sakit_id');
    }
}