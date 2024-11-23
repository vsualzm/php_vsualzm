<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    use HasFactory;

    // Tentukan field yang boleh diisi melalui mass assignment
    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'telepon'
    ];
}