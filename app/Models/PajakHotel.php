<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PajakHotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'npwpd',
        'nama_pemilik',
        'nama_usaha',
        'alamat_usaha',
    ];
}
