<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajakRestoran extends Model
{
    use HasFactory;

    protected $fillable = [
        'npwpd',
        'nama_pemilik',
        'nama_usaha',
        'alamat_usaha',
    ];
}
